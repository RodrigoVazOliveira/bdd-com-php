<?php

use Thomas\Arquitetura\Domain\Studant\CPF;
use Thomas\Arquitetura\Domain\Studant\Email;
use Thomas\Arquitetura\Domain\Studant\Studant;
use Thomas\Arquitetura\Domain\Studant\Telephone;
use Thomas\Arquitetura\Infra\Studant\StudantRepositoryInMemory;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$cpf = new CPF($cpf);
$telephone = new Telephone($ddd, $number);
$email = new Email($email);
$studant = new Studant($cpf, $name, $email, [$telephone]);
$repository = new StudantRepositoryInMemory();
$repository->add($studant);

//php ponto-acesso-aluno.php "085.633.986-52" "Rodrigo Vaz" "rodrigo@vaz.com.br" "41" "96500646"