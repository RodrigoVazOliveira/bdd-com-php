<?php

namespace Thomas\Arquitetura\Domain\Studant;

class TelephoneLimiteExcededException extends \DomainException {

    function __construct(string $message) {
        parent::__construct($message);
    }

}
