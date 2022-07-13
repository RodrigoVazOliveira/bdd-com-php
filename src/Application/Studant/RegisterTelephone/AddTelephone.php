<?php

namespace Thomas\Arquitetura\Application\RegisterTelephone;

use Thomas\Arquitetura\Domain\Studant\StudantRepository;

class AddTelephone {

    private StudantRepository $studantRepository;

    function __construct(StudantRepository $studantRepository) {
        $this->studantRepository = $studantRepository;
    }

    public function execute(AddTelephoneDTO $addTelephoneDTO) {
        $studant = $addTelephoneDTO->convertDtoToDomain();
        $this->studantRepository->addTelephone($studant);
    }

}
