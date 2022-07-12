<?php

namespace Thomas\Arquitetura\Infra\Recommend;

use Thomas\Arquitetura\Domain\Recommend\SendEmailRecommended;
use Thomas\Arquitetura\Domain\Studant\Studant;

class SendMailRecommendWithPHPMail implements SendEmailRecommended {

    public function send(Studant $studant): void {
        mail($studant->getEmail(), 'Indicacao', 'Foi recebido a indicacao');
    }

}
