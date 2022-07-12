<?php

namespace Thomas\Arquitetura\Infra\Recommend;

use PHPMailer\PHPMailer\PHPMailer;
use Thomas\Arquitetura\Domain\Recommend\SendEmailRecommended;
use Thomas\Arquitetura\Domain\Studant\Studant;

class SendMailRecommendWithPHPMailler implements SendEmailRecommended {

    public function send(Studant $studant): void {
        $phpmailer = new PHPMailer();
        $phpmailer->setFrom($studant->getEmail());
        $phpmailer->Subject = 'Voce foi indicado!';
        $phpmailer->Body = 'voce foi indicado para estudar na escola';

        $phpmailer->send();
    }

}
