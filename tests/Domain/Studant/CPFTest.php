<?php

namespace Tests\Domain\Studant;

use PHPUnit\Framework\TestCase;
use Thomas\Arquitetura\Domain\Studant\CPF;

class CPFTest extends TestCase {

    public function testCpfInvalido(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('CPF informado e invalido!');
        $cpf = new CPF('0894987989');
    }

    public function testCPFValido() {
        $cpf = new CPF('248.487.430-87');
        $this->assertEquals('248.487.430-87', $cpf->getIdentify());
    }

}
