<?php

namespace Tests\Domain\Studant;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Thomas\Arquitetura\Domain\Studant\Telephone;

class TelephoneTest extends TestCase {

    public function testTelephoneWithDDDMaiorQueTresAlgarismo(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('DDD invalido');
        $ddi = '123';
        $telephone = new Telephone($ddi, '');
    }

    public function testTelephoneWithTelephoneMaiorQueNoveAlgarismo(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Numero de telefone invalido');
        $telephone = new Telephone('51', '12345678910');
    }

    public function testCreateTelephoneValid(): void {
        $ddi = '31';
        $number = '99500646';
        $telephone = new Telephone($ddi, $number);
        self::assertEquals($ddi, $telephone->getDdi());
        self::assertEquals($number, $telephone->getNumber());
    }

}
