<?php
declare(strict_types=1);

namespace BSP\Credentials\Command\Registration;

use BSP\Credentials\ValueObject\CredentialsId;
use BSP\Credentials\ValueObject\Email;
use BSP\Credentials\ValueObject\PlainPassword;

final class RegisterCredentials
{
    private $credentialsId;
    private $email;
    private $plainPassword;

    public function __construct(CredentialsId $credentialsId, ?string $email, ?string $plainPassword)
    {
        $this->credentialsId = $credentialsId;
        $this->email = new Email($email);
        $this->plainPassword = new PlainPassword($plainPassword);
    }

    public function credentialsId(): CredentialsId
    {
        return $this->credentialsId;
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
