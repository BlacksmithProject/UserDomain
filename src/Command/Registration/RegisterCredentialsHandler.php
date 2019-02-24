<?php
declare(strict_types=1);

namespace BSP\Credentials\Command\Registration;

use BSP\Credentials\CredentialsDomainException;
use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\Port\CredentialsReader;
use BSP\Credentials\Port\CredentialsWriter;
use BSP\Credentials\Port\PasswordEncoder;
use BSP\Credentials\ValueObject\HashedPassword;

final class RegisterCredentialsHandler
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
     * @throws CredentialsDomainException
     */
    public function handle(RegisterCredentials $registerCredentials): void
    {
        if ($this->credentialsReader->isEmailAlreadyUsed($registerCredentials->email())) {
            throw new CredentialsDomainException('credentials.email.already_used');
        }

        $credentials = new Credentials(
            $registerCredentials->credentialsId(),
            $registerCredentials->email(),
            new HashedPassword($registerCredentials->plainPassword(), $this->passwordEncoder)
        );

        $this->credentialsWriter->add($credentials);
    }
}
