<?php

namespace Tests\App;

use App\BadCredentialsException;
use App\Counter;
use App\Regular;
use App\User;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Regular::class)]
#[UsesClass(User::class)]
#[UsesClass(Counter::class)]
#[UsesClass(BadCredentialsException::class)]
class RegularTest extends TestCase
{
    public function testMemberCanBeCastedToString(): void
    {
        // Arrange
        $member = new Regular(
            user: new User('adrien'),
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
        $member = new Regular(
            user: new User('adrien'),
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
        $member = new Regular(
            user: new User('adrien'),
            login: 'plop',
            password: 'azerty',
            age: 23
        );

        // Act
        $member->auth('plop', 'azerty');

        // Assert
        $this->addToAssertionCount(1);
    }
}
