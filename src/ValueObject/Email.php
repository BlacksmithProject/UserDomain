<?php
declare(strict_types=1);

namespace BSP\Credentials\ValueObject;

use Assert\Assert;

final class Email
{
    private $value;

    public function __construct(?string $email)
    {
        Assert::that($email)
            ->notNull('credentials.email.must_not_be_null')
            ->notBlank('credentials.email.must_not_be_blank')
            ->email('credentials.email.must_be_valid');

        $this->value = $email;
    }

    public function value(): string
    {
        return $this->value;
    }
}
