<?php
class User
{
    private $user_id;
    private $name;
    private $email;
    private $phone_number;

    public function __construct($user_id, $name, $email, $phone_number)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone_number()
    {
        return $this->phone_number;
    }
}