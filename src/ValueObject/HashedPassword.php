<?php
declare(strict_types=1);

namespace BSP\Credentials\ValueObject;

use BSP\Credentials\Port\PasswordEncoder;

final class HashedPassword
{
    private $value;

    public function __construct(PlainPassword $password, PasswordEncoder $passwordEncoder)
    {
        $this->value = $passwordEncoder->hash($password);
    }

    public function value(): string
    {
        return $this->value;
    }
}
