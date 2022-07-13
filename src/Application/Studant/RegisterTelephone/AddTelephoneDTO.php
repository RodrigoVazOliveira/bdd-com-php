<?php

namespace Thomas\Arquitetura\Application\RegisterTelephone;

use Thomas\Arquitetura\Domain\Studant\Studant;
use Thomas\Arquitetura\Domain\Studant\StudantBuilder;

class AddTelephoneDTO {

    private string $cpf;
    private string $ddd;
    private string $number;

    function __construct(string $cpf, string $ddd, string $number) {
        $this->cpf = $cpf;
        $this->ddd = $ddd;
        $this->number = $number;
    }

    public function convertDtoToDomain(): Studant {
        $studantBuilder = new StudantBuilder();
        $studant = $studantBuilder->withCpf($this->cpf)
                ->withTelephone($this->ddd, $this->number)
                ->build();

        return $studant;
    }

}
