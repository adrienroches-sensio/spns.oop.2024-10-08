<?php

declare(strict_types=1);

interface CanAuthenticate
{
    public function auth(
        string $login,

        #[SensitiveParameter]
        string $password
    ): bool;
}
