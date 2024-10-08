<?php

class Member implements CanAuthenticate
{
    /**
     * @var array<class-string, positive-int>
     */
    private static array $count = [];

    public function __construct(
        public string $login,

        #[SensitiveParameter]
        public string $password,

        public int    $age,
    ) {
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
}
