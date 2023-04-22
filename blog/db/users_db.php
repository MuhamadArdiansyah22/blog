<?php
include_once(__DIR__ . '/connection.php');
include_once(__DIR__ . '/../models/user.php');

class UsersDB extends Connection
{
    public static function all()
    {
        $users = self::executeQuery("SELECT * FROM users");
        $usersArr = [];
        foreach ($users as $user) {
            $usersArr[] = new User(
                $user['user_id'],
                $user['name'],
                $user['email'],
                $user['phone_number']
            );
        }
        return $usersArr;
    }

    public static function get($user_id)
    {
        $users = self::executeQuery("SELECT * FROM users WHERE user_id = ?", array($user_id));
        $user = null;
        if (count($users) > 0) {
            $user = new User(
                $users[0]['user_id'],
                $users[0]['name'],
                $users[0]['email'],
                $users[0]['phone_number']
            );
        }
        return $user;
    }
    public static function create(User $user)
    {
        $sql = "INSERT INTO users (name, email, phone_number) VALUES (?, ?, ?)";
        $params = array($user->getName(), $user->getEmail(), $user->getPhone_number());
        return self::executeQuery($sql, $params);
    }
    public static function update(User $user)
    {
        $sql = "UPDATE users SET name = ?, email = ?, phone_number = ? WHERE user_id = ?";
        $params = array($user->getName(), $user->getEmail(), $user->getPhone_number(), $user->getUser_id());
        return self::executeQuery($sql, $params);
    }
    public static function delete($user_id)
    {
        $deleteUserSql = "DELETE FROM users WHERE user_id = ?";
        $deletePostsSql = "DELETE FROM posts WHERE user_id = ?";
        $params = array($user_id);
        self::executeQuery($deleteUserSql, $params);
        return self::executeQuery($deletePostsSql, $params);
    }
}