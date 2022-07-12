<?php

namespace Thomas\Arquitetura\Infra\Studant;

use Thomas\Arquitetura\Domain\Studant\EncryptPassword;

class EncryptPasswordMD5 implements EncryptPassword {

    public function execute(string $password): string {
        return md5($password);
    }

    public function verify(string $passwordTextPlain, string $passwordCrypted): bool {
        return md5($passwordTextPlain) === $passwordCrypted;
    }

}
