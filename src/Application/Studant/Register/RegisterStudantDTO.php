<?php

namespace Thomas\Arquitetura\Application\Studant\Register;

use Thomas\Arquitetura\Domain\Studant\Studant;

class RegisterStudantDTO {

    private string $cpf;
    private string $name;
    private string $email;

    function __construct(string $cpf, string $name, string $email) {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public function convertDTOToStudant(): Studant {
        $studantBuilder = new StudantBuilder();
        $studant = $studantBuilder->withCpf($this->cpf)
                ->withEmail($this->email)
                ->withName($this->name)
                ->build();

        return $studant;
    }

}
