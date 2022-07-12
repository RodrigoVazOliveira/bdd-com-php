<?php

namespace Tests\Domain\Studant;

use PHPUnit\Framework\TestCase;
use Thomas\Arquitetura\Domain\Studant\StudantBuilder;

class StudantTest extends TestCase {

    function testCreateStudantWithExceptionEmailInvalid(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('E-mail informado e invalido!');
        $studantBuilder = new StudantBuilder();
        $studantBuilder->withEmail('erqeqr');
    }

    function testCreateStudantWithExcepetionCPFInvalid(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('CPF informado e invalido!');
        $studantBuilder = new StudantBuilder();
        $studantBuilder->withEmail('rodrigo@email.com')->withCpf('23423423432');
    }

    function testCreateStudantWithExceptionWithDDDInvalid(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('DDD invalido');
        $studantBuilder = new StudantBuilder();
        $studantBuilder
                ->withEmail('rodrigo@email.com')
                ->withCpf('248.487.430-87')
                ->withTelephone('1321', '');
    }

    function testCreateStudantWithExceptionWithTelephoneInvalid(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Numero de telefone invalido');
        $studantBuilder = new StudantBuilder();
        $studantBuilder
                ->withEmail('rodrigo@email.com')
                ->withCpf('248.487.430-87')
                ->withTelephone('31', '12345678910');
    }

    function testCreateStudantWithSuccess(): void {
        $studantBuilder = new StudantBuilder();
        $studant = $studantBuilder
                        ->withEmail('rodrigo@email.com')
                        ->withCpf('248.487.430-87')
                        ->withName('estudante um')
                        ->withTelephone('31', '99500646')->build();

        self::assertEquals('248.487.430-87', $studant->getCpf());
    }

}
