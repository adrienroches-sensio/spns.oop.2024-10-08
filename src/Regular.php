<?php

namespace App;

use Count;
use Override;
use SensitiveParameter;

class Regular implements Member
{
    public function __construct(
        private User $user,

        public string $login,

        #[SensitiveParameter]
        public string $password,

        public int    $age,
    ) {
        Counter::add($this);
    }

    public function __destruct()
    {
        Counter::remove($this);
    }

    #[Override]
    public function auth(
        string $login,

        #[SensitiveParameter]
        string $password
    ): void {
        if ($this->login !== $login) {
            throw BadCredentialsException::forLogin($login);
        }

        if ($this->password !== $password) {
            throw BadCredentialsException::forPassword($login);
        }
    }

    #[Override]
    public function __toString(): string
    {
        return "{$this->user->getName()} #{$this->login}";
    }
}
