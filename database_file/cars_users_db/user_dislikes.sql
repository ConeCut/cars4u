create table user_dislikes
(
    id          int auto_increment
        primary key,
    user_id     int                                   not null,
    post_id     int                                   not null,
    disliked_at timestamp default current_timestamp() null,
    count       int       default 1                   not null,
    constraint unique_like
        unique (user_id, post_id),
    constraint user_dislikes_ibfk_1
        foreign key (user_id) references users (id),
    constraint user_dislikes_ibfk_2
        foreign key (post_id) references posts (id)
);

create index post_id
    on user_dislikes (post_id);

