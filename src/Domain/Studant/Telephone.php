<?php

namespace Thomas\Arquitetura\Domain\Studant;

class Telephone {

    private string $ddi;
    private string $number;

    function __construct(string $ddi, string $number) {
        $this->setDdi($ddi);
        $this->setNumber($number);
    }

    private function setDdi(string $ddi): void {
        if (preg_match('/\d{3}/', $ddi)) {
            throw new \InvalidArgumentException('DDD invalido');
        }

        $this->ddi = $ddi;
    }

    private function setNumber(string $number): void {
        if (preg_match('/\d{9,10}/', $number)) {
            throw new \InvalidArgumentException('Numero de telefone invalido');
        }

        $this->number = $number;
    }

    public function getDdi(): string {
        return $this->ddi;
    }

    public function getNumber(): string {
        return $this->number;
    }

    public function __toString(): string {
        return $this->ddi + ' ' + $this->number;
    }

}
