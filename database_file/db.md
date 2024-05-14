# Database Schema for IMISHITPOSTSTATUS

## Table: `post_replies`
This table contains the replies to posts.

| Column      | Data Type     | Constraints            | Description                    |
|-------------|---------------|------------------------|--------------------------------|
| `post_id`   | INT           | NOT NULL               | ID of the post being replied to|
| `post_reply`| VARCHAR(255)  | NOT NULL               | Content of the reply           |
| `replied_by`| VARCHAR(255)  | NOT NULL               | Username of the replier        |
| `id`        | INT           | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each reply |

### Indexes
- `posts_id`: Index on `post_id`
- `replied_by`: Index on `replied_by`

## Table: `posts`
This table contains the posts made by users.

| Column     | Data Type     | Constraints            | Description                           |
|------------|---------------|------------------------|---------------------------------------|
| `id`       | INT           | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each post       |
| `username` | VARCHAR(255)  | NOT NULL               | Username of the user who created the post |
| `post`     | VARCHAR(10000)| NOT NULL               | Content of the post                   |
| `likes`    | INT           | DEFAULT 0              | Number of likes the post has received |
| `carinfo`  | VARCHAR(255)  | NOT NULL               | Information about the car in the post |
| `photo`    | LONGBLOB      |                        | Photo associated with the post        |
| `datetime` | DATETIME      | DEFAULT CURRENT_TIMESTAMP, NOT NULL | Date and time when the post was created |
| `dislikes` | INT           | DEFAULT 0              | Number of dislikes the post has received |

## Table: `user_dislikes`
This table tracks the dislikes made by users.

| Column       | Data Type    | Constraints            | Description                              |
|--------------|--------------|------------------------|------------------------------------------|
| `id`         | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each dislike record |
| `user_id`    | INT          | NOT NULL               | ID of the user who disliked the post      |
| `post_id`    | INT          | NOT NULL               | ID of the disliked post                   |
| `disliked_at`| TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP | Timestamp when the post was disliked      |
| `count`      | INT          | DEFAULT 1, NOT NULL    | Count of dislikes (usually 1)             |

### Constraints
- `unique_like`: Unique constraint on `(user_id, post_id)`
- `user_dislikes_ibfk_1`: Foreign key referencing `users(id)`
- `user_dislikes_ibfk_2`: Foreign key referencing `posts(id)`

### Indexes
- `post_id`: Index on `post_id`

## Table: `user_friends`
This table contains user friendship relations.

| Column | Data Type | Constraints            | Description                              |
|--------|-----------|------------------------|------------------------------------------|
| `id`   | INT       | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each friendship record |

## Table: `user_likes`
This table tracks the likes made by users.

| Column   | Data Type    | Constraints            | Description                              |
|----------|--------------|------------------------|------------------------------------------|
| `id`     | INT          | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each like record    |
| `user_id`| INT          | NOT NULL               | ID of the user who liked the post         |
| `post_id`| INT          | NOT NULL               | ID of the liked post                      |
| `liked_at`| TIMESTAMP   | DEFAULT CURRENT_TIMESTAMP | Timestamp when the post was liked         |

### Constraints
- `unique_like`: Unique constraint on `(user_id, post_id)`
- `user_likes_ibfk_1`: Foreign key referencing `users(id)`
- `user_likes_ibfk_2`: Foreign key referencing `posts(id)`

### Indexes
- `post_id`: Index on `post_id`

## Table: `user_reports`
This table contains user reports.

| Column | Data Type | Constraints            | Description                              |
|--------|-----------|------------------------|------------------------------------------|
| `id`   | INT       | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each report record |

## Table: `users`
This table contains information about the users registered on the website.

| Column       | Data Type     | Constraints            | Description                              |
|--------------|---------------|------------------------|------------------------------------------|
| `id`         | INT           | PRIMARY KEY, AUTO_INCREMENT | Unique identifier for each user           |
| `username`   | VARCHAR(255)  | NOT NULL               | Username of the user                      |
| `pwd`        | VARCHAR(255)  | NOT NULL               | Password for the user's account           |
| `email`      | VARCHAR(255)  | NOT NULL               | Email address of the user                 |
| `admin`      | TINYINT(1)    | DEFAULT 0, NOT NULL    | Boolean flag indicating if the user is an admin |
| `profile_photo` | LONGBLOB   | DEFAULT 'profile.png'  | Profile photo of the user                 |

