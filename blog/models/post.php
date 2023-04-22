<?php
class Post
{
    private $post_id;
    private $user_id;
    private $title;
    private $content;
    private $image_url;
    private $published_date;

    public function __construct($post_id, $user_id, $title, $content, $image_url, $published_date)
    {
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->image_url = $image_url;
        $this->published_date = $published_date;
    }


    public function getPost_id()
    {
        return $this->post_id;
    }


    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }


    public function getImage_url()
    {
        return $this->image_url;
    }
    public function getPublished_date()
    {
        return $this->published_date;
    }


}