create table user_likes
(
    id       int auto_increment
        primary key,
    user_id  int                                   not null,
    post_id  int                                   not null,
    liked_at timestamp default current_timestamp() null,
    constraint unique_like
        unique (user_id, post_id),
    constraint user_likes_ibfk_1
        foreign key (user_id) references users (id),
    constraint user_likes_ibfk_2
        foreign key (post_id) references posts (id)
);

create index post_id
    on user_likes (post_id);

