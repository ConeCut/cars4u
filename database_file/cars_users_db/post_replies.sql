create table post_replies
(
    post_id    int          not null,
    post_reply varchar(255) not null,
    replied_by varchar(255) not null,
    id         int auto_increment
        primary key
);

create index posts_id
    on post_replies (post_id);

create index replied_by
    on post_replies (replied_by);

