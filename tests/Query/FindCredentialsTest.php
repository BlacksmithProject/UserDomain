<?php
declare(strict_types=1);

namespace BSP\Credentials\Tests\Query;

use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\Port\CredentialsReader;
use BSP\Credentials\Port\PasswordEncoder;
use BSP\Credentials\Query\FindCredentials;
use BSP\Credentials\ValueObject\CredentialsId;
use BSP\Credentials\ValueObject\Email;
use BSP\Credentials\ValueObject\HashedPassword;
use BSP\Credentials\ValueObject\PlainPassword;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class FindCredentialsTest extends TestCase
{
    public function testItCanGetCredentialsWithId(): void
    {
        /** @var CredentialsReader|MockObject $credentialsReader */
        $credentialsReader = $this->createMock(CredentialsReader::class);
        /** @var PasswordEncoder|MockObject $passwordEncoder */
        $passwordEncoder = $this->createMock(PasswordEncoder::class);
        /** @var CredentialsId|MockObject $credentialsId */
        $credentialsId = $this->createMock(CredentialsId::class);

        $credentials = new Credentials(
            $credentialsId,
            new Email('john.snow@winterfell.north'),
            new HashedPassword(new PlainPassword('winter is coming'), $passwordEncoder)
        );

        $query = new FindCredentials($credentialsReader);

        $credentialsReader
            ->expects($this->once())
            ->method('get')
            ->willReturn($credentials);

        $query->withId($credentialsId);
    }
    public function testItCanGetCredentialsWithEmail(): void
    {
        /** @var CredentialsReader|MockObject $credentialsReader */
        $credentialsReader = $this->createMock(CredentialsReader::class);
        /** @var PasswordEncoder|MockObject $passwordEncoder */
        $passwordEncoder = $this->createMock(PasswordEncoder::class);
        /** @var CredentialsId|MockObject $credentialsId */
        $credentialsId = $this->createMock(CredentialsId::class);

        $credentials = new Credentials(
            $credentialsId,
            new Email('john.snow@winterfell.north'),
            new HashedPassword(new PlainPassword('winter is coming'), $passwordEncoder)
        );

        $query = new FindCredentials($credentialsReader);

        $credentialsReader
            ->expects($this->once())
            ->method('findByEmail')
            ->willReturn($credentials);

        $query->withEmail(new Email('john.snow@winterfell.north'));
    }
}
