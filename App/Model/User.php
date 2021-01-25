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
    
    protected $Email;
    protected $Pseudo;
    protected $id;
    protected $role;

    function __construct($Email, $Pseudo, $id,$role)
    {
        $this->Email = $Email;
        $this->Pseudo = $Pseudo;
        $this->id = $id;
        $this->role = $role;
    }

    public static function isMailExist($Email)
    {
        $DB = static::DBConnect();

        $mail_request = $DB->prepare('SELECT * FROM `user` WHERE `Email` = ?');
        $mail_request->execute([$Email]);

        $response = $mail_request->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }
        return new User (

            $response[0]['Email'],
            $response[0]['Pseudo'],
            $response[0]['id'],
            $response[0]['role']
        );
    }


    public static function insertNewUser($mail,$Pseudo,$profilepicture,$password,$role)
    {
        $DB = static::DBConnect();

        $insertUser_request = $DB->prepare('INSERT INTO `user` (`Email`, `Pseudo`,`password`,`role`) 
        VALUES (?, ?, ?, NULL,?)');
        $insertUser_request->execute([$mail,$Pseudo,$password,$role]);

        return $DB->lastInsertId();
    }

    public static function isUserExist($mail,$password)
    {

        $DB = static::DBConnect();
        
        $request_user = $DB->prepare('SELECT * FROM `user` WHERE `Email` = ?');
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

            $response[0]['Email'],
            $response[0]['Pseudo'],
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

    public function getPseudo()
    {
        return $this->Pseudo;
    }

    public function setPseudo($iduser, $newPseudo)
    {
        $DB = static::DBConnect();

        $request_Pseudo = $DB->prepare ('UPDATE `user` SET `Pseudo` = ? WHERE `id` = ?');
        $request_Pseudo->execute([$newPseudo,$iduser]);

        return;
    }

    public function setMail ($iduser, $newEmail)
    {
        $DB = static::DBConnect();

        $request_Pseudo = $DB->prepare ('UPDATE `user` SET `Email` = ? WHERE `id` = ?');
        $request_Pseudo->execute([$newEmail,$iduser]);

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