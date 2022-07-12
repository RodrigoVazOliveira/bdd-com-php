<?php

namespace Thomas\Arquitetura\Domain\Studant;

class CPF {

    private string $identify;

    public function __construct(string $identify) {
        $this->setIdentify($identify);
    }

    private function setIdentify(string $identify): void {
        $options = [
            'options' => [
                'regexp' => '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'
            ]
        ];

        if (filter_var($identify, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('CPF informado e invalido!');
        }

        $this->identify = $identify;
    }

    public function getIdentify(): string {
        return $this->identify;
    }

    public function __toString(): string {
        return $this->identify;
    }

}
