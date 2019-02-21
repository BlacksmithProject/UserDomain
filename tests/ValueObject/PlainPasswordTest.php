<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\ValueObject;

use Assert\InvalidArgumentException;
use BSP\Credentials\ValueObject\PlainPassword;
use PHPUnit\Framework\TestCase;

final class PlainPasswordTest extends TestCase
{
    public function testItCanBeInitialized(): void
    {
        $plainPassword = new PlainPassword('winter is coming');

        $this->assertSame('winter is coming', $plainPassword->value());
    }

    public function testItCannotBeInitializedWithNull(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('user.password.must_not_be_null');

        new PlainPassword(null);
    }

    public function testItCannotBeInitalizedWithBlankString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('user.password.must_not_be_blank');

        new PlainPassword('');
    }
}
