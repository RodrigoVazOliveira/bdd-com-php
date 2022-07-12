<?php

namespace Thomas\Arquitetura\Domain\Studant;

interface StudantRepository {

    public function add(Studant $studant): void;

    public function findByCPF(CPF $cpf): Studant;

    public function findAll(): array;
}
