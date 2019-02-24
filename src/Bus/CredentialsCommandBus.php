<?php
declare(strict_types=1);

namespace BSP\Credentials\Bus;

use BSP\CommandBus\CommandBus;
use BSP\Credentials\Command\Registration\RegisterCredentials;
use BSP\Credentials\Command\Registration\RegisterCredentialsHandler;

final class CredentialsCommandBus extends CommandBus
{
    public function __construct(RegisterCredentialsHandler $registerCredentialsHandler)
    {
        $this->handlers[RegisterCredentials::class] = $registerCredentialsHandler;
    }
}
