<?php

namespace Tests\Domain\Studant;

use PHPUnit\Framework\TestCase;
use Thomas\Arquitetura\Domain\Studant\Email;

class EmailTest extends TestCase {

    public function testEmailInvalido(): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('E-mail informado e invalido!');
        $email = new Email('eadasfs');
    }

    public function testEmailValido(): void {
        $email = new Email('rodrigo@email.com');
        self::assertEquals('rodrigo@email.com', $email->getAddress());
    }

}
