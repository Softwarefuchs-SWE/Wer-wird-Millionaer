create table emensawerbeseite.kategorie
(
    id        bigint       not null
        primary key,
    name      varchar(80)  not null,
    eltern_id bigint       null,
    bildname  varchar(200) null
);

