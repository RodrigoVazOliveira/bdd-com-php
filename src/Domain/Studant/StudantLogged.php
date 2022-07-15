<?php

namespace Thomas\Arquitetura\Domain\Studant;

class StudantLogged implements Event {

    private \DateTimeInterface $dateMoment;
    private CPF $cpf;

    function __construct(CPF $cpf) {
        $this->dateMoment = new \DateTimeImmutable();
        $this->cpf = $cpf;
    }

    public function getCpfStudant(): CPF {
        return $this->cpf;
    }

    public function moment(): \DateTimeInterface {
        return $this->dateMoment;
    }

}
