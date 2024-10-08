<?php

class Member
{
    private static int $count = 0;

    public function __construct(
        public string $login,

        #[SensitiveParameter]
        public string $password,

        public int    $age,
    ) {
        self::$count++;
    }

    public function __destruct()
    {
        self::$count--;
    }

    public static function count(): int
    {
        return self::$count;
    }

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
