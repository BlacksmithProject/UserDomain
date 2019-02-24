<?php
declare(strict_types=1);

namespace BSP\Credentials\Port;

use BSP\Credentials\Entity\Credentials;

interface CredentialsWriter
{
    public function add(Credentials $credentials): void;
}
