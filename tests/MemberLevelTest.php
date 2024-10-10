<?php

declare(strict_types=1);

namespace Tests\App;

use App\MemberLevel;
use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use UnhandledMatchError;

#[CoversClass(MemberLevel::class)]
class MemberLevelTest extends TestCase
{
    public function testAllCasesHaveLabel(): void
    {
        foreach (MemberLevel::cases() as $case) {
            try {
                $case->label();
            } catch (UnhandledMatchError $e) {
                $this->fail("UnhandledMatchError : {$case->name}.");
            }

            $this->addToAssertionCount(1);
        }
    }

    public static function provideLabelIsCorrectForCase(): Generator
    {
        yield 'Admin' => [
            MemberLevel::Admin,
            'Admin',
        ];

        yield 'Super Admin' => [
            MemberLevel::SuperAdmin,
            'Super Admin',
        ];
    }

    #[DataProvider('provideLabelIsCorrectForCase')]
    public function testLabelIsCorrectForCase(MemberLevel $memberLevel, string $expectedLabel): void
    {
        $this->assertSame($expectedLabel, $memberLevel->label());
    }
}
