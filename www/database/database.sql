
CREATE TABLE IF NOT EXISTS empresa(
    empresaId integer primary key,
    custoPorMinuto integer not null,
    tempoSetup float not null,
    numeroTrabalhadores integer not null
);

CREATE TABLE IF NOT EXISTS horario (
    empresaId integer,
    a1 text, -- 1 Segunda 2 Terça 3 Quarta ...
    b1 text, -- a ini slot 1 - b fim slot 1 - c ini slot 2 - d fim slot 2 ...
    a2 text,
    b2 text,
    a3 text,
    b3 text,
    a4 text,
    b4 text,
    a5 text,
    b5 text,
    c1 text,
    d1 text,
    c2 text,
    d2 text,
    c3 text,
    d3 text,
    c4 text,
    d4 text,
    c5 text,
    d5 text,
    e1 text,
    f1 text,
    e2 text,
    f2 text,
    e3 text,
    f3 text,
    e4 text,
    f4 text,
    e5 text,
    f5 text,
    g1 text,
    h1 text,
    g2 text,
    h2 text,
    g3 text,
    h3 text,
    g4 text,
    h4 text,
    g5 text,
    h5 text,
    foreign key (empresaId) references empresa(empresaId)
);

CREATE TABLE IF NOT EXISTS encomenda (
    encomendaId integer primary key,
    empresaId integer,
    cliente text,
    ndocumento text,
    nomeProduto text,
    inicioPrevisto datetime,
    terminoPrevisto datetime,
    inicioReal datetime,
    terminoReal datetime,
    numeroPecas integer not null,
    estado text,
    t TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
    1, --encomendaId
    1, --empresaId
    'Jnow', --cliente
    '56FGH83R', --ndocumento
    'Biquini Amarelo', --nomeProduto
    '2021-08-22 10:00:00', --inicioPrevisto
    '2021-08-22 10:00:00', --fimPrevisto
    '2021-08-22 10:00:00', --inicioReal
    '2021-08-22 10:00:00', --fimReal
    4, --num peças
    '5d 3h 0m 0s', --estado
    CURRENT_TIMESTAMP
);

INSERT INTO encomenda VALUES(
   2, --encomendaId
    1, --empresaId
    'Jnow', --cliente
    '56FGH83R', --ndocumento
    'Camisa', --nomeProduto
    '2021-08-24 10:00:00', --inicioPrevisto
    '2021-08-24 8:00:00', --fimPrevisto
    '2021-08-24 10:00:00', --inicioReal
    '2021-08-24 10:00:00', --fimReal
    4, --num peças
    '5d 3h 0m 0s',--estado
    CURRENT_TIMESTAMP
);

INSERT INTO horario VALUES(
    1, --empresaId
    '7:50',
    '10:00',
    '7:50',
    '10:00',
    '7:50',
    '10:00',
    '7:50',
    '10:00',
    '7:50',
    '10:00',
    '10:10',
    '12:30',
    '10:10',
    '12:30',
    '10:10',
    '12:30',
    '10:10',
    '12:30',
    '10:10',
    '12:30',
    '13:30',
    '16:00',
    '13:30',
    '16:00',
    '13:30',
    '16:00',
    '13:30',
    '16:00',
    '13:30',
    '16:00',
    '16:10',
    '17:00',
    '16:10',
    '17:00',
    '16:10',
    '17:00',
    '16:10',
    '17:00',
    '16:10',
    '17:00'
)

