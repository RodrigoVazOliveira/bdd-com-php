<?php

namespace Thomas\Arquitetura\Domain\Studant;

class Studant {

    private CPF $cpf;
    private string $name;
    private Email $email;
    private array $telephones;

    function __construct(CPF $cpf, string $name, Email $email, array $telephones) {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->telephones = $telephones;
    }

    public function addTelephone(string $ddi, string $number): void {
        $this->telephones[] = new Telephone($ddi, $number);
    }

    function getCpf(): CPF {
        return $this->cpf;
    }

    function getName(): string {
        return $this->name;
    }

    function getEmail(): Email {
        return $this->email;
    }

    function getTelephones(): array {
        return $this->telephones;
    }

}
