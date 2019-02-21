<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\Command\Registration;

use BSP\Credentials\Command\Registration\RegisterCredentials;
use BSP\Credentials\ValueObject\Email;
use BSP\Credentials\ValueObject\PlainPassword;
use PHPUnit\Framework\TestCase;

final class RegisterCredentialsTest extends TestCase
{
    public function testItCanBeInitialized(): void
    {
        $command = new RegisterCredentials('oberyn.martell@sunspear.south', 'unbowed unbent unbroken');

        $this->assertInstanceOf(Email::class, $command->email());
        $this->assertInstanceOf(PlainPassword::class, $command->plainPassword());
    }
}
