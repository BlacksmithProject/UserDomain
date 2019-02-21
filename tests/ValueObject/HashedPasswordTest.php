<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\ValueObject;

use Assert\InvalidArgumentException;
use BSP\Credentials\ValueObject\HashedPassword;
use BSP\Credentials\ValueObject\PlainPassword;
use PHPUnit\Framework\TestCase;

final class HashedPasswordTest extends TestCase
{
    public function testItCanBeInitialized(): void
    {
        $plainPassword = new HashedPassword('hashed-password');

        $this->assertSame('hashed-password', $plainPassword->value());
    }

    public function testItCannotBeInitializedWithNull(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('user.password.must_not_be_null');

        new HashedPassword(null);
    }

    public function testItCannotBeInitalizedWithBlankString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('user.password.must_not_be_blank');

        new HashedPassword('');
    }
}
