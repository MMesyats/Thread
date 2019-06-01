<?php

class User
{
    public static function registration($username,$password,$email)
    {
        $query="INSERT INTO `user` (`id`, `username`, `image`, `password`, `email`) 
        VALUES (NULL, '{$username}', '/user.png', '{$password}', '{$email}');";
        $db=DB::getConnection();
        $result = $db->query($query);
        return User::login($username,$password);
    }

    public static function login($username,$password)
    {
        $query="SELECT id FROM user WHERE username = '{$username}' AND password = '{$password}'";
        $db=DB::getConnection();
        $result = $db->query($query);
        if($user=$result->fetch())
        {
            $_SESSION['user_id']=$user['id'];
            $_COOKIE['user_id']=$user['id'];
            return $user['id'];
        }
        return 0;
    }

    public static function getUserProfile($id)
    {
        $user = array();

        $db=DB::getConnection();
        $result = $db->query('SELECT id,username,image '.
        'FROM user WHERE id='.$id);
        if($user=$result->fetch())
        {
            return $user;
        }
        return $user;
    }
}