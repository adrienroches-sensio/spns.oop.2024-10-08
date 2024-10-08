<?php

class Member extends User implements CanAuthenticate
{
    /**
     * @var array<class-string, positive-int>
     */
    private static array $count = [];

    public function __construct(
        string $name,

        public string $login,

        #[SensitiveParameter]
        public string $password,

        public int    $age,
    ) {
        parent::__construct($name);

        self::$count[static::class] ??= 0;
        self::$count[static::class]++;
    }

    public function __destruct()
    {
        self::$count[static::class]--;
    }

    public static function count(): int
    {
        return self::$count[static::class];
    }

    #[Override]
    public function auth(
        string $login,

        #[SensitiveParameter]
        string $password
    ): bool {
        return
            $this->login === $login &&
            $this->password === $password
        ;
    }

    #[Override]
    public function __toString(): string
    {
        return "{$this->getName()} #{$this->login}";
    }
}
