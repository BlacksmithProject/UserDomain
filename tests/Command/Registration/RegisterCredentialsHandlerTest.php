<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\Command\Registration;

use BSP\Credentials\Command\Registration\RegisterCredentials;
use BSP\Credentials\Command\Registration\RegisterCredentialsHandler;
use BSP\Credentials\CredentialsDomainException;
use BSP\Credentials\Port\CredentialsReader;
use BSP\Credentials\Port\CredentialsWriter;
use BSP\Credentials\Port\PasswordEncoder;
use BSP\Credentials\ValueObject\CredentialsId;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class RegisterCredentialsHandlerTest extends TestCase
{
    public function testItCanHandleCommand(): void
    {
        /** @var CredentialsReader|MockObject $credentialsReader */
        $credentialsReader = $this->createMock(CredentialsReader::class);
        /** @var CredentialsWriter|MockObject $credentialsWriter */
        $credentialsWriter = $this->createMock(CredentialsWriter::class);
        /** @var PasswordEncoder|MockObject $passwordEncoder */
        $passwordEncoder = $this->createMock(PasswordEncoder::class);

        /** @var CredentialsId|MockObject $id */
        $id = $this->createMock(CredentialsId::class);
        $command = new RegisterCredentials($id, 'daenerys.targaryen@dragonstone.east', 'fire and blood');

        $handler = new RegisterCredentialsHandler($credentialsReader, $credentialsWriter, $passwordEncoder);

        $credentialsReader
            ->expects($this->once())
            ->method('isEmailAlreadyUsed')
            ->willReturn(false);

        $credentialsWriter
            ->expects($this->once())
            ->method('add');

        $handler->handle($command);
    }

    public function testItCannotHandleCommandWithAlreadyUsedEmail(): void
    {
        /** @var CredentialsReader|MockObject $credentialsReader */
        $credentialsReader = $this->createMock(CredentialsReader::class);
        /** @var CredentialsWriter|MockObject $credentialsWriter */
        $credentialsWriter = $this->createMock(CredentialsWriter::class);
        /** @var PasswordEncoder|MockObject $passwordEncoder */
        $passwordEncoder = $this->createMock(PasswordEncoder::class);

        /** @var CredentialsId|MockObject $id */
        $id = $this->createMock(CredentialsId::class);
        $command = new RegisterCredentials($id, 'daenerys.targaryen@dragonstone.east', 'fire and blood');

        $handler = new RegisterCredentialsHandler($credentialsReader, $credentialsWriter, $passwordEncoder);

        $credentialsReader
            ->expects($this->once())
            ->method('isEmailAlreadyUsed')
            ->willReturn(true);

        $this->expectException(CredentialsDomainException::class);
        $this->expectExceptionMessage('credentials.email.already_used');

        $handler->handle($command);
    }
}
