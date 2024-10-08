<?php

class Member
{
    public string $login;

    /**
     * @param string $login
     * @param string $password
     * @param string $age
     */
    public function __construct(
        string $login,

        #[SensitiveParameter]
        public string $password,

        public int    $age,
    ) {
        $this->login = $login;
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
