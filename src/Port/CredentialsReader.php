<?php
declare(strict_types=1);

namespace BSP\Credentials\Port;

use BSP\Credentials\Entity\Credentials;
use BSP\Credentials\ValueObject\CredentialsId;
use BSP\Credentials\ValueObject\Email;

interface CredentialsReader
{
    public function isEmailAlreadyUsed(Email $email): bool;

    public function get(CredentialsId $credentialsId): Credentials;
}
