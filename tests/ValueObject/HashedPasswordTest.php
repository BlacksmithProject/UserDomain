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
        /** @var PasswordEncoder|MockObject $passwordEncoder */
        $passwordEncoder = $this->createMock(PasswordEncoder::class);
        $passwordEncoder->expects($this->once())->method('hash')->willReturn('hashed-password');

        $plainPassword = new HashedPassword(new PlainPassword('winter is coming'), $passwordEncoder);

        $this->assertSame('hashed-password', $plainPassword->value());
    }
}
