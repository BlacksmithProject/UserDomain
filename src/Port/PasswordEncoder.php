<?php
declare(strict_types=1);

namespace BSP\Credentials\Port;

use BSP\Credentials\ValueObject\HashedPassword;
use BSP\Credentials\ValueObject\PlainPassword;

interface PasswordEncoder
{
    public function hash(PlainPassword $password): string;

    public function verify(PlainPassword $plainPassword, HashedPassword $hashedPassword): bool;
}
