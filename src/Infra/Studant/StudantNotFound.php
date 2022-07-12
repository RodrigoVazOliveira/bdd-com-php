<?php

namespace Thomas\Arquitetura\Infra\Studant;

use DomainException;
use Thomas\Arquitetura\Domain\Studant\CPF;

class StudantNotFound extends DomainException {

    public function __construct(CPF $cpf) {
        parent::__construct('Aluno com ' . $cpf->__toString() . ' nao encontrado!');
    }

}
