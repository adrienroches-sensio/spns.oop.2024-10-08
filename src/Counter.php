<?php

namespace App;

class Counter
{
    /**
     * @var array<class-string<Member>, positive-int>
     */
    private static array $count = [];

    public static function add(Member $member): void
    {
        self::$count[$member::class] ??= 0;
        self::$count[$member::class]++;
    }

    public static function remove(Member $member): void
    {
        self::$count[$member::class]--;
    }

    /**
     * @param class-string<Member> $memberClass
     */
    public static function get(string $memberClass): int
    {
        return self::$count[$memberClass] ?? 0;
    }
}
