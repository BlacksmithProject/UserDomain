<?php
declare(strict_types=1);

namespace BSP\User\ValueObject;

use Assert\Assert;

final class PlainPassword
{
    private $value;

    public function __construct(?string $password)
    {
        Assert::that($password)
            ->notNull('user.password.must_not_be_null')
            ->notBlank('user.password.must_not_be_blank');

        $this->value = $password;
    }

    public function value(): string
    {
        return $this->value;
    }
}
