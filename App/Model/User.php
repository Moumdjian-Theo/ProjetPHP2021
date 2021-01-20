<?php

/**
 * 
 * @author : Théo MOUMDJIAN 
 * @author : Guillaume RISCH 
 * 
 * @brief : User model
 */



class User extends Model 
{
    protected $email;
    protected $username;
    protected $id;
    protected $profilepicture;
    protected $role;

    function __construct($email, $username, $id, 
    $profilepicture,$role)
    {
        $this->email = $email;
        $this->username = $username;
        $this->id = $id;
        $this->profilepicture = $profilepicture;
        $this->role = $role;
    }

    public static function isMailExist($mail)
    {
        $DB = static::DBConnect();

        $mail_request = $DB->prepare('SELECT * FROM `user` WHERE `email` = ?');
        $mail_request->execute([$email]);

        $response = $mail_request->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }
        return new User (
            $response[0]['email'],
            $response[0]['username'],
            $response[0]['profilePicture'],
            $response[0]['id']
        );
    }


    public static function insertNewUser($mail,$username,$profilepicture,$password,$role)
    {
        $DB = static::DBConnect();

        $insertUser_request = $DB->prepare('INSERT INTO `user` (`email`, `username`,`password`, `profilePicture`,`role`) 
        VALUES (?, ?, ?, NULL,?)');
        $insertUser_request->execute([$mail,$username,$password,$role]);

        return $DB->lastInsertId();
    }

    public static function isUserExist($mail,$password)
    {

        $DB = static::DBConnect();
        
        $request_user = $DB->prepare('SELECT * FROM `user` WHERE `email` = ?');
        $request_user->execute([$mail]);

        $response = $request_user->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        var_dump($response);

        if(!password_verify($password, $response[0]['password']))
        {
            return false;
        }

        return new User (

            $response[0]['email'],
            $response[0]['username'],
            $response[0]['profilePicture'],
            $response[0]['id']
        );
    }

    public static function setRole($iduser,$role)
    {
        $DB = static::DBConnect();

        $request_role = $DB->prepare('UPDATE `user` SET `role` = ? WHERE `id` = ? ');
        $request_role->execute([$role,$iduser]);

        return;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getMail()
    {
        return $this->mail;
        
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($iduser, $newusername)
    {
        $DB = static::DBConnect();

        $request_username = $DB->prepare ('UPDATE `user` SET `username` = ? WHERE `id` = ?');
        $request_username->execute([$newusername,$iduser]);

        return;
    }

    public function setMail ($iduser, $newemail)
    {
        $DB = static::DBConnect();

        $request_username = $DB->prepare ('UPDATE `user` SET `email` = ? WHERE `id` = ?');
        $request_username->execute([$newemail,$iduser]);

        return;
    }

    public function getProfilePicture()
    {
        return $this->profilePicture;
    }
    
    public function getRole()
    {
        return $this->role;
    }

    public function setPassword($iduser, $newpassword)
    {
        $DB = static::DBConnect();

        $request_password = $DB->prepare('UPDATE `user` SET `password` = ? WHERE `id` = ? ');
        $request_password->execute([$newpassword, $iduser]);

        return;

    }


}