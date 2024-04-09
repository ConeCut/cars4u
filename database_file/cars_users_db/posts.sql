create table posts
(
    id       int auto_increment
        primary key,
    username varchar(255)                         not null,
    post     varchar(10000)                       not null,
    likes    int      default 0                   null,
    carinfo  varchar(255)                         not null,
    photo    longblob                             null,
    datetime datetime default current_timestamp() not null
);

