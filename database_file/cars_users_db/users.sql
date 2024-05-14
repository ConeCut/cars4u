create table users
(
    id            int auto_increment
        primary key,
    username      varchar(255)                     not null,
    pwd           varchar(255)                     not null,
    email         varchar(255)                     not null,
    admin         tinyint(1) default 0             not null,
    profile_photo longblob   default 'profile.png' null
);

