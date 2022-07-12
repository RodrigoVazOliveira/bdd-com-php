<?php

namespace Thomas\Arquitetura\Domain\Studant;

interface EncryptPassword {

    public function execute(string $password): string;

    public function verify(string $passwordTextPlain, string $passwordCrypted): bool;
}
