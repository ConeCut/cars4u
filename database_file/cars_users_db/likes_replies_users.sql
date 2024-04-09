create table likes_replies_users
(
    user_id       int not null,
    like_post_id  int not null,
    reply_post_id int not null,
    reply_upvoted int not null,
    constraint like_post_id
        foreign key (like_post_id) references posts (id),
    constraint reply_post_id
        foreign key (reply_post_id) references posts (id),
    constraint upvoted_repliy
        foreign key (reply_upvoted) references posts_replies (id),
    constraint user_id
        foreign key (user_id) references users (id)
);

