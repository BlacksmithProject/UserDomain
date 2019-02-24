<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\ValueObject;

use Assert\InvalidArgumentException;
use BSP\Credentials\Port\PasswordEncoder;
use BSP\Credentials\ValueObject\HashedPassword;
use BSP\Credentials\ValueObject\PlainPassword;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class HashedPasswordTest extends TestCase
{
    public function testItCanBeInitialized(): void
    {
        $plainPassword = new HashedPassword('hashed-password');

        $this->assertSame('hashed-password', $plainPassword->value());
    }
}
