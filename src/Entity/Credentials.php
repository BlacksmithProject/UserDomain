<?php
declare(strict_types=1);

namespace BSP\Credentials\Entity;

use BSP\Credentials\ValueObject\Email;
use BSP\Credentials\ValueObject\HashedPassword;
use BSP\Credentials\ValueObject\CredentialsId;

final class Credentials
{
    private $id;
    private $email;
    private $password;

    public function __construct(
        CredentialsId $credentialsId,
        Email $email,
        HashedPassword $password
    ) {
        $this->id = $credentialsId;
        $this->email = $email;
        $this->password = $password;
    }

    public function id(): CredentialsId
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): HashedPassword
    {
        return $this->password;
    }
}
