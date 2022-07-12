<?php

namespace Thomas\Arquitetura\Domain\Studant;

class Email {

    private string $address;

    public function __construct(string $address) {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("E-mail informado e invalido!");
        }

        $this->address = $address;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function __toString(): string {
        return $this->address;
    }

}
