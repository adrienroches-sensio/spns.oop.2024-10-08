<?php

namespace Tests\App;

use App\BadCredentialsException;
use App\Member;
use App\User;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Member::class)]
#[UsesClass(User::class)]
#[UsesClass(BadCredentialsException::class)]
class MemberTest extends TestCase
{
    public function testMemberCanBeCastedToString(): void
    {
        // Arrange
        $member = new Member(
            name: 'adrien',
            login: 'plop',
            password: 'azerty',
            age: 23
        );

        // Act
        $result = (string) $member;

        // Assert
        $this->assertSame('adrien #plop', $result);
    }

    public function testAuthFailsIfInvalidCredentials(): void
    {
        // Arrange
        $member = new Member(
            name: 'adrien',
            login: 'plop',
            password: 'azerty',
            age: 23
        );

        // Expect
        $this->expectException(BadCredentialsException::class);
        $this->expectExceptionMessage('Bad credentials for login \'FakeLogin\'.');

        // Act
        $member->auth('FakeLogin', 'azerty');
    }

    public function testAuthSucceedIfValidCredentials(): void
    {
        // Arrange
        $member = new Member(
            name: 'adrien',
            login: 'plop',
            password: 'azerty',
            age: 23
        );

        // Act
        $member->auth('plop', 'azerty');

        // Assert
        $this->addToAssertionCount(1);
    }

    public function testCountIsKeepingTrack(): void
    {
        $this->assertSame(0, Member::count());

        $member1 = new Member(
            name: 'adrien',
            login: 'plop',
            password: 'azerty',
            age: 23
        );

        $this->assertSame(1, Member::count());

        $member2 = new Member(
            name: 'plop',
            login: 'truc',
            password: 'azerty',
            age: 55
        );

        $this->assertSame(2, Member::count());

        unset($member1);

        $this->assertSame(1, Member::count());

        unset($member2);

        $this->assertSame(0, Member::count());
    }
}
