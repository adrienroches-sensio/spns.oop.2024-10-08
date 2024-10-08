<?php

class Admin extends Member
{
    public function __construct(
        string $login,

        #[SensitiveParameter]
        string $password,

        int $age,

        private MemberLevel $level = MemberLevel::Admin
    ) {
        parent::__construct($login, $password, $age);
    }

    public function auth(string $login, #[SensitiveParameter] string $password): bool
    {
        if ($this->level === MemberLevel::SuperAdmin) {
            return true;
        }

        return parent::auth($login, $password);
    }
}
