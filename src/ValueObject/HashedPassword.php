<?php
declare(strict_types=1);

namespace BSP\Credentials\ValueObject;

final class HashedPassword
{
    private $value;

    public function __construct(string $hash)
    {
        $this->value = $hash;
    }

    public function value(): string
    {
        return $this->value;
    }
}
