<?php
declare(strict_types=1);

namespace BSP\Credentials\Port;

use BSP\Credentials\ValueObject\Email;

interface CredentialsReader
{
    public function isEmailAlreadyUsed(Email $email): bool;
}
