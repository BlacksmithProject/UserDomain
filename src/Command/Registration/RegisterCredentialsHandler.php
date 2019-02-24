<?php
declare(strict_types=1);

namespace BSP\Credentials\Command\Registration;

use BSP\CommandBus\Command;
use BSP\CommandBus\CommandHandler;
use BSP\Credentials\CredentialsDomainException;
use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\Port\CredentialsReader;
use BSP\Credentials\Port\CredentialsWriter;
use BSP\Credentials\Port\PasswordEncoder;
use BSP\Credentials\ValueObject\HashedPassword;

final class RegisterCredentialsHandler implements CommandHandler
{
    private $credentialsReader;
    private $credentialsWriter;
    private $passwordEncoder;

    public function __construct(
        CredentialsReader $credentialsReader,
        CredentialsWriter $credentialsWriter,
        PasswordEncoder $passwordEncoder
    ) {
        $this->credentialsReader = $credentialsReader;
        $this->credentialsWriter = $credentialsWriter;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param RegisterCredentials $registerCredentials
     *
     * @throws CredentialsDomainException
     */
    public function handle(Command $registerCredentials): void
    {
        if ($this->credentialsReader->isEmailAlreadyUsed($registerCredentials->email())) {
            throw new CredentialsDomainException('credentials.email.already_used');
        }

        $credentials = new Credentials(
            $registerCredentials->credentialsId(),
            $registerCredentials->email(),
            new HashedPassword($this->passwordEncoder->hash($registerCredentials->plainPassword()))
        );

        $this->credentialsWriter->add($credentials);
    }
}
