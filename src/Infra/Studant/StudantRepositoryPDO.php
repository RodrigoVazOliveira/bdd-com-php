<?php

namespace Thomas\Arquitetura\Infra\Studant;

use Thomas\Arquitetura\Domain\Studant\CPF;
use Thomas\Arquitetura\Domain\Studant\Studant;
use Thomas\Arquitetura\Domain\Studant\StudantBuilder;
use Thomas\Arquitetura\Domain\Studant\StudantRepository;

class StudantRepositoryPDO implements StudantRepository {

    private \PDO $pdo;

    function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function add(Studant $studant): void {
        $sql = 'INSERT INTO studants VALUES (:cpf, :name, :email);';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':cpf', $studant->getCpf()->__toString(), \PDO::PARAM_STR);
        $stmt->bindValue(':name', $studant->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $studant->getEmail()->__toString(), \PDO::PARAM_STR);
        $stmt->execute();

        $telephones = $studant->getTelephones();
        $this->saveTelephones($telephones, $studant->getCpf());
    }

    private function saveTelephones(array $telephones, string $cpf) {
        $sql = 'INSERT INTO telephones VALUES (:ddd, :number, :cpf_studant);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cpf_studant', $cpf, \PDO::PARAM_STR);

        foreach ($telephones as $telephone) {
            $stmt->bindValue(':ddd', $telephone->getDdi(), \PDO::PARAM_STR);
            $stmt->bindValue(':number', $telephone->getNumber(), \PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    public function findAll(): array {
        $sql = 'SELECT s.cpf, s.name, s.email, t.ddi as ddi, t.number as number '
                . 'FROM studants s, telephones t WHERE t.cpf_studant = s.cpf';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cpf', $cpf->__toString(), \PDO::PARAM_STR);
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $studants = $this->mountObjectForFindAll($resultSet);

        return array_values($studants);
    }

    private function mountObjectForFindAll(array $resultSet): array {
        $studants = [];
        foreach ($resultSet as $lines) {
            $cpf = $lines['cpf'];
            if (!array_key_exists($lines['cpf'], $studants)) {
                $studantBuilder = new StudantBuilder();
                $studants[$cpf] = $studantBuilder->withCpf($cpf)
                                ->withEmail($lines['email'])
                                ->withName($lines['name'])->build();
            }

            if ($lines['ddi'] != null && $lines['number'] != null) {
                $studants[$cpf]->addTelephone($lines['ddi'], $lines['number']);
            }
        }

        return $studants;
    }

    public function findByCPF(CPF $cpf): Studant {
        $sql = 'SELECT s.cpf, s.name, s.email, t.ddi as ddi, t.number as number '
                . 'FROM studants s, telephones t WHERE t.cpf_studant = s.cpf AND s.cpf = :cpf';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cpf', $cpf->__toString(), \PDO::PARAM_STR);
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (count($resultSet) === 0) {
            throw new StudantNotFound($cpf);
        }

        $studant = $this->MountStudant($resultSet);

        return $studant;
    }

    private function MountStudant(array $resultSet): Studant {
        $firstLine = $resultSet[0];
        $studantBuilder = new StudantBuilder();
        $studantBuilder->withCpf($firstLine['cpf'])
                ->withEmail($firstLine['email'])
                ->withName($firstLine['name']);

        foreach ($resultSet as $line) {
            $studantBuilder->withTelephone($line['ddi'], $line['number']);
        }

        return $studantBuilder->build();
    }

}
