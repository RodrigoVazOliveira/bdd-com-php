<?php

namespace Thomas\Arquitetura\Infra\Studant;

use Thomas\Arquitetura\Domain\Studant\EncryptPassword;

class EncryptPasswordWithDefaultPHP implements EncryptPassword {

    public function execute(string $password): string {
        return password_hash($password, PASSWORD_ARGON2I);
    }

    public function verify(string $passwordTextPlain, string $passwordCrypted): bool {
        return password_hash($passwordTextPlain, $passwordTextPlain);
    }

}
