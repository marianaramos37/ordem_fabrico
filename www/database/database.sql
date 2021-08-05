
CREATE TABLE IF NOT EXISTS empresa(
    empresaId integer primary key,
    custoPorMinuto integer not null,
    tempoSetup float not null,
    numeroTrabalhadores integer not null
);

CREATE TABLE IF NOT EXISTS encomenda (
    encomendaId integer primary key,
    empresaId integer,
    nomeProduto text,
    inicio datetime,
    termino datetime,
    numeroPecas integer not null,
    foreign key (empresaId) references empresa(empresaId)
);

CREATE TABLE IF NOT EXISTS peça (
    peçaId integer primary key,
    encomendaId integer,
    tempoSeconds integer,
    numeroSetups integer,
    foreign key (encomendaId) references encomenda(encomendaId)
);

PRAGMA foreign_keys=ON;

/* Initial Database */

INSERT INTO empresa VALUES(
    1,
    0.155,
    121.8,
    3
);

INSERT INTO encomenda VALUES(
    1,
1,
    'Biquini Amarelo',
    '2007-01-01 10:00:00',
    '2007-01-01 10:00:00',
    4
);

INSERT INTO encomenda VALUES(
    2,
1,
    'Camisa',
    '2007-01-01 10:00:00',
    '2007-01-01 10:00:00',
    300
);

