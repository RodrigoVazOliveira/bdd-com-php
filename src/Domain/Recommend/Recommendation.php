<?php

namespace Thomas\Arquitetura\Domain\Recommend;

class Recommendation {

    private Studant $recommmend;
    private Studant $recommendaded;
    private \DateTimeInterface $date;

    function __construct(Studant $recommmend, Studant $recommendaded) {
        $this->recommmend = $recommmend;
        $this->recommendaded = $recommendaded;

        $this->date = new \DateTimeImmutable();
    }

}
