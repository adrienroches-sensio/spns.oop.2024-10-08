<?php

namespace App;

use Override;
use SensitiveParameter;

class Admin implements Member
{
    public function __construct(
        private Regular $regular,

        private MemberLevel $level = MemberLevel::Admin
    ) {
        Counter::add($this);
    }

    public function __destruct()
    {
        Counter::remove($this);
    }

    #[Override]
    public function auth(string $login, #[SensitiveParameter] string $password): void
    {
        if (MemberLevel::SuperAdmin === $this->level) {
            return;
        }

        $this->regular->auth($login, $password);
    }

    #[Override]
    public function __toString(): string
    {
        return $this->regular . " as {$this->level->label()}";
    }
}
