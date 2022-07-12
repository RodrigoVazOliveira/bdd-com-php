CREATE TABLE studants
(
    cpf VARCHAR(25) NOT NULL,
    name VARCHAR(70) NOT NULL,
    email VARCHAR(150) NOT NULL,
    PRIMARY KEY (cpf)
);

CREATE TABLE telephones
(
    cpf_studant VARCHAR(25) NOT NULL,
    ddi VARCHAR(5) NOT NULL,
    number VARCHAR(45) NOT NULL,
    FOREIGN KEY (cpf_studant) REFERENCES studants (cpf)
);
