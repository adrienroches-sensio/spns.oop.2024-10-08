<?php

declare(strict_types=1);

namespace App;

use SensitiveParameter;

class CachedMember implements Member
{
    public function __construct(
        private Member $member,
    ) {
    }

    public function auth(string $login, #[SensitiveParameter] string $password): void
    {
        $this->member->auth($login, $password);
    }

    public static function count(): int
    {
    }

    public function __toString(): string
    {
        return (string) $this->member;
    }
}
