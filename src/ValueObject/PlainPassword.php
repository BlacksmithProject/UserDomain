<?php
declare(strict_types=1);

namespace BSP\Credentials\ValueObject;

use Assert\Assert;

final class PlainPassword
{
    private $value;

    public function __construct(?string $password)
    {
        Assert::that($password)
            ->notNull('credentials.password.must_not_be_null')
            ->notBlank('credentials.password.must_not_be_blank');

        $this->value = $password;
    }

    public function value(): string
    {
        return $this->value;
    }
}
