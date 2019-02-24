<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\ValueObject;

use Assert\InvalidArgumentException;
use BSP\Credentials\ValueObject\Email;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testItCanBeInitialized(): void
    {
        $email = new Email('john.snow@winterfell.north');

        $this->assertSame('john.snow@winterfell.north', $email->value());
    }

    public function testItCannotBeInitializedWithNull(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('credentials.email.must_not_be_null');

        new Email(null);
    }

    public function testItCannotBeInitializedWithBlankString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('credentials.email.must_not_be_blank');

        new Email('');
    }

    public function testItCannotBeInitializedWithInvalidEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('credentials.email.must_be_valid');

        new Email('invalid-email');
    }
}
