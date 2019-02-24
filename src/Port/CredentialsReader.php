<?php
declare(strict_types=1);

namespace BSP\Credentials\Port;

use BSP\Credentials\CredentialsDomainException;
use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\ValueObject\CredentialsId;
use BSP\Credentials\ValueObject\Email;

interface CredentialsReader
{
    /**
     * Should return true if Credentials with provided Email are found.
     */
    public function isEmailAlreadyUsed(Email $email): bool;

    /**
     * Should find Credentials with provided Id or throw an exception
     *
     * @throws CredentialsDomainException
     */
    public function get(CredentialsId $credentialsId): Credentials;

    /**
     * Should find Credentials with provided Email or throw an exception
     *
     * @throws CredentialsDomainException
     */
    public function findByEmail(Email $email): Credentials;
}
