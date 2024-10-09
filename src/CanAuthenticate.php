<?php

namespace App;

use SensitiveParameter;

interface CanAuthenticate
{
    /**
     * @throws BadCredentialsException If either $password or $login does no match.
     */
    public function auth(
        string $login,

        #[SensitiveParameter]
        string $password
    ): void;
}
