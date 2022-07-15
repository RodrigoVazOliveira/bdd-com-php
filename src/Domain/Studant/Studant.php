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
        $this->verifyLimitTelephone();
        $this->telephones[] = new Telephone($ddi, $number);
    }

    public function getCpf(): CPF {
        return $this->cpf;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): Email {
        return $this->email;
    }

    public function getTelephones(): array {
        return $this->telephones;
    }

    private function verifyLimitTelephone(): void {
        $sizeTelephone = count($this->telephones);
        if ($sizeTelephone === 2) {
            throw new TelephoneLimiteExcededException('O limite de telephone e de apenas 2 por aluno');
        }
    }

}
