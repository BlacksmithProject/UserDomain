<?php
declare(strict_types=1);

namespace BSP\Credentials\Query;

use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\Port\CredentialsReader;
use BSP\Credentials\ValueObject\CredentialsId;
use BSP\Credentials\ValueObject\Email;

final class FindCredentials
{
    private $credentialsReader;

    public function __construct(CredentialsReader $credentialsReader)
    {
        $this->credentialsReader = $credentialsReader;
    }

    public function withId(CredentialsId $credentialsId): Credentials
    {
        return $this->credentialsReader->get($credentialsId);
    }

    public function withEmail(Email $email): Credentials
    {
        return $this->credentialsReader->findByEmail($email);
    }
}
