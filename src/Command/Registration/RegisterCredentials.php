<?php
declare(strict_types=1);

namespace BSP\Credentials\Command\Registration;

use BSP\Credentials\ValueObject\Email;
use BSP\Credentials\ValueObject\PlainPassword;

final class RegisterCredentials
{
    private $email;
    private $plainPassword;

    public function __construct(?string $email, ?string $plainPassword)
    {
        $this->email = new Email($email);
        $this->plainPassword = new PlainPassword($plainPassword);
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function plainPassword(): PlainPassword
    {
        return $this->plainPassword;
    }
}
