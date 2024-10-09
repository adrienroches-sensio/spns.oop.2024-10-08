<?php

namespace App;

use Override;
use SensitiveParameter;

class Admin extends Member
{
    public function __construct(
        string $name,
        string $login,

        #[SensitiveParameter]
        string $password,

        int $age,

        private MemberLevel $level = MemberLevel::Admin
    ) {
        parent::__construct($name, $login, $password, $age);
    }

    #[Override]
    public function auth(string $login, #[SensitiveParameter] string $password): void
    {
        if ($this->level === MemberLevel::SuperAdmin) {
            return;
        }

        parent::auth($login, $password);
    }

    #[Override]
    public function __toString(): string
    {
        return parent::__toString() . " as {$this->level->label()}";
    }
}
