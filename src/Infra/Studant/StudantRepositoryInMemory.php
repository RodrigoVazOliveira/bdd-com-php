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

    public function addTelephone(Studant $studant): void {
        $studantExists = array_filter($this->studants, function ($studantActual) {
            return $studantActual->getCpf() == $studant->getCpf();
        });

        if ($studantExists == null) {
            throw new \InvalidArgumentException('O estudante informado nao existe');
        }

        $telephones = $studant->getTelephones();

        foreach ($telephones as $telephone) {
            $studantExists->addTelephone($telephone->getDdi(), $telephone->getNumber());
        }
    }

}
