<?php

namespace App;

use RuntimeException;
use Throwable;

class BadCredentialsException extends RuntimeException
{
    private const BAD_LOGIN = 404;

    private function __construct(
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public static function forLogin(
        string $login,
        Throwable|null $previous = null
    ): self {
        return new self(
            "Bad credentials for login '{$login}'.",
            code: self::BAD_LOGIN,
            previous: $previous,
        );
    }
}
