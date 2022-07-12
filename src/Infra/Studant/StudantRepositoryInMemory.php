<?php

namespace Thomas\Arquitetura\Infra\Studant;

use Thomas\Arquitetura\Domain\Studant\CPF;
use Thomas\Arquitetura\Domain\Studant\Studant;
use Thomas\Arquitetura\Domain\Studant\StudantRepository;

class StudantRepositoryInMemory implements StudantRepository {

    private array $studants = [];

    public function add(Studant $studant): void {
        $this->studants[] = $studant;
    }

    public function findAll(): array {
        return $this->studants;
    }

    public function findByCPF(CPF $cpf): Studant {
        $results = array_filter($this->studants,
                fn($studant) => $studant->getCpf() == $cpf);
        if (count($results) === 0) {
            throw new StudantNotFound($cpf);
        }

        if (count($results) > 1) {
            throw new Exception('cpfs duplicados!');
        }

        return $results[0];
    }

}
