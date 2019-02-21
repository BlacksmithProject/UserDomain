<?php
declare(strict_types=1);

namespace BSP\User\ValueObject;

use Assert\Assert;

final class Email
{
    private $value;

    public function __construct(?string $email)
    {
        Assert::that($email)
            ->notNull('user.email.must_not_be_null')
            ->notBlank('user.email.must_not_be_blank')
            ->email('user.email.must_be_valid');

        $this->value = $email;
    }

    public function value(): string
    {
        return $this->value;
    }
}
