<?php

namespace Tests\Application\Studant\Register;

use PHPUnit\Framework\TestCase;
use Thomas\Arquitetura\Application\Studant\Register\RegisterStudant;
use Thomas\Arquitetura\Application\Studant\Register\RegisterStudantDTO;
use Thomas\Arquitetura\Domain\Studant\CPF;
use Thomas\Arquitetura\Infra\Studant\StudantRepositoryInMemory;

class RegisterStudantTest extends TestCase {

    function testStudantMustToAddToRepository(): void {
        $registerStudantDTO = new RegisterStudantDTO('588.390.990-69', 'Rodrigo Vaz', 'rodrigovaz@gmail.com');
        $studantRepository = new StudantRepositoryInMemory();
        $registerStudant = new RegisterStudant($studantRepository);
        $registerStudant->execute($registerStudantDTO);

        $studantSaved = $studantRepository->findByCPF(new CPF('588.390.990-69'));

        self::assertNotNull($studantSaved);
        self::assertEquals('Rodrigo Vaz', $studantSaved->getName());
        self::assertCount(0, $studantSaved->getTelephones());
    }

}
