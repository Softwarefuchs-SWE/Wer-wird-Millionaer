create table emensawerbeseite.gericht
(
    id           int          not null
        primary key,
    name         varchar(80)  not null,
    beschreibung varchar(800) not null,
    erfasst_am   date         not null,
    vegetarisch  tinyint(1)   not null,
    vegan        tinyint(1)   not null,
    preisintern  double       not null,
    preisextern  double       not null,
    constraint name
        unique (name),
    check (`preisintern` <= `preisextern`),
    check (`preisintern` > 0)
);

