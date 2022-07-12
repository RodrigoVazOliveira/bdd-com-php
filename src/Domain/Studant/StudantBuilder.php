<?php

namespace Thomas\Arquitetura\Domain\Studant;

class StudantBuilder {

    private Email $email;
    private string $name;
    private CPF $cpf;
    private array $telephones;

    public function withCpf(string $cpf): StudantBuilder {
        $this->cpf = new CPF($cpf);

        return $this;
    }

    public function withEmail(string $email): StudantBuilder {
        $this->email = new Email($email);

        return $this;
    }

    public function withName(string $name): StudantBuilder {
        $this->name = $name;

        return $this;
    }

    public function withTelephone(string $ddi, string $number): StudantBuilder {
        $this->telephones[] = new Telephone($ddi, $number);

        return $this;
    }

    public function build(): Studant {
        return new Studant($this->cpf, $this->name, $this->email, $this->telephones);
    }

}
