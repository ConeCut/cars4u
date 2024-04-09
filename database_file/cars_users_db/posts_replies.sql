create table posts_replies
(
    post_id       int           null,
    post_reply    varchar(255)  null,
    reply_upvotes int default 0 null,
    id            int auto_increment
        primary key,
    constraint posts_id
        foreign key (post_id) references posts (id)
);

