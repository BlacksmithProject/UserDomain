<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\Entity;

use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\ValueObject\CredentialsId;
use BSP\Credentials\ValueObject\Email;
use BSP\Credentials\ValueObject\HashedPassword;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class CredentialsTest extends TestCase
{
    public function testItCanBeInitialized(): void
    {
        /** @var CredentialsId|MockObject $id */
        $id = $this->createMock(CredentialsId::class);
        $email = new Email('tyrion.lannister@casterlyrock.west');
        $hashedPassword = new HashedPassword('hashed-password');

        $credentials = new Credentials($id, $email, $hashedPassword);

        $this->assertSame($id, $credentials->id());
        $this->assertSame($email, $credentials->email());
        $this->assertSame($hashedPassword, $credentials->password());
    }
}
