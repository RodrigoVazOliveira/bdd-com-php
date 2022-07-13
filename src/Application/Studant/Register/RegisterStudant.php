<?php

namespace Thomas\Arquitetura\Application\Studant\Register;

use Thomas\Arquitetura\Domain\Studant\StudantRepository;

class RegisterStudant {

    private StudantRepository $studantRepository;

    function __construct(StudantRepository $studantRepository) {
        $this->studantRepository = $studantRepository;
    }

    public function execute(RegisterStudantDTO $registerStudantDTO) {
        $studant = $registerStudantDTO->convertDTOToStudant();
        $this->studantRepository->add($studant);
    }

}
