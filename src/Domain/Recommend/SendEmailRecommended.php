<?php

namespace Thomas\Arquitetura\Domain\Recommend;

use Thomas\Arquitetura\Domain\Studant\Studant;

interface SendEmailRecommended {

    public function send(Studant $studant): void;
}
