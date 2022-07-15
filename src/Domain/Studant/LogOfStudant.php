<?php

namespace Thomas\Arquitetura\Domain\Studant;

class LogOfStudant {

    public function react(StudantLogged $studantLogged): void {
        fprintf(STDERR, "O aluno com CPF %s foi matriculado na data %s",
                $studantLogged->getCpfStudant()->__toString(),
                $studantLogged->moment()->format('d/m/Y'));
    }

}
