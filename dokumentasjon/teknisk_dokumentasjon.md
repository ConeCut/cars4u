Technical Documentation: cars4u Website

This technical documentation provides an overview of the database structure and functionality of the cars4u website. The database consists of four tables, each serving a specific purpose in managing user data, posts, likes, replies, and other relevant information.
Database Schema
Table: likes_replies_users

    user_id: Foreign key referencing the primary key (id) of the users table, representing the user who performed the action (liked a post, replied to a post).
    like_post_id: Foreign key referencing the primary key (id) of the posts table, indicating the post that was liked by the user.
    reply_post_id: Foreign key referencing the primary key (id) of the posts table, indicating the post to which the user replied.
    reply_upvoted: Foreign key referencing the primary key (id) of the post_replies table, indicating the reply that was upvoted by the user.

Table: posts

    id: Primary key (INT AUTO INCREMENT) uniquely identifying each post.
    username: VARCHAR(255) representing the username of the user who created the post.
    post: VARCHAR(255) containing the title or content of the post.
    likes: INT representing the number of likes the post has received.
    carinfo: VARCHAR(255) providing information about the car discussed in the post.
    photo: LONGBLOB storing the image associated with the post.
    datetime: DATETIME indicating the date and time when the post was created.

Table: users

    id: Primary key (INT AUTO INCREMENT) uniquely identifying each user.
    username: VARCHAR(255) representing the username chosen by the user for login.
    pwd: VARCHAR(255) storing the hashed password of the user.
    email: VARCHAR(255) containing the email address of the user.
    admin: BOOL indicating whether the user has administrative privileges.

Table: post_replies

    post_id: Foreign key referencing the primary key (id) of the posts table, indicating the post to which the reply belongs.
    post_reply: VARCHAR(255) containing the content of the reply.
    reply_upvotes: INT representing the number of upvotes the reply has received.
    id: Primary key (INT AUTO INCREMENT) uniquely identifying each reply.

Functionality

    User Authentication: Allows users to create accounts, log in, and stay authenticated using their username and password.
    Post Creation: Enables users to create new posts containing information and images about their favorite cars.
    Post Interaction: Users can like posts and reply to them, facilitating engagement and discussion within the community.
    Admin Privileges: Grants administrative privileges to designated users, allowing them to manage user accounts and oversee website operations.

This technical documentation provides insight into the structure and functionality of the cars4u website's database, empowering developers to understand and maintain the system effectively.