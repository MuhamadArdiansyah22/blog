<?php
include_once(__DIR__ . '/connection.php');
include_once(__DIR__ . '/../models/post.php');

class PostsDB extends Connection
{
    public static function all()
    {
        $posts = self::executeQuery("SELECT * FROM posts");
        $postsArr = [];
        foreach ($posts as $user) {
            $postsArr[] = new Post(
                $user['post_id'],
                $user['user_id'],
                $user['title'],
                $user['content'],
                $user['image_url'],
                $user['published_date'],
            );
        }
        return $postsArr;
    }

    public static function get($post_id)
    {
        $posts = self::executeQuery("SELECT * FROM posts WHERE post_id = ?", array($post_id));
        $post = null;
        if (count($posts) > 0) {
            $post = new Post(
                $posts[0]['post_id'],
                $posts[0]['user_id'],
                $posts[0]['title'],
                $posts[0]['content'],
                $posts[0]['image_url'],
                $posts[0]['published_date'],
            );
        }
        return $post;
    }
    public static function create(Post $post)
    {
        $sql = "INSERT INTO posts (user_id, title, content, image_url, published_date) VALUES (?, ?, ?, ?, ?)";
        $params = array($post->getUser_id(), $post->getTitle(), $post->getContent(), $post->getImage_url(), $post->getPublished_date());
        return self::executeQuery($sql, $params);
    }
    public static function update(Post $post)
    {
        $sql = "UPDATE posts SET user_id = ?, title = ?, content = ?, image_url = ?, published_date = ?  WHERE post_id = ?";
        $params = array($post->getUser_id(), $post->getTitle(), $post->getContent(), $post->getImage_url(), $post->getPublished_date(), $post->getPost_id());
        return self::executeQuery($sql, $params);
    }
    public static function delete($post_id)
    {
        $sql = "DELETE FROM posts WHERE post_id = ?";
        $params = array($post_id);
        return self::executeQuery($sql, $params);
    }
}