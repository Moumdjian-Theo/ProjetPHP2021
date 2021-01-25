<?php

/**
 *  @title : template.php
 * 
 *  @brief : Example model
 * 
 */
class User extends Model{

    
    private $id;
    private $email;
    private $password;
    private $pseudo;
    private $role;

    /**
     *  @name : __construct
     * 
     *  @brief : constructor
     * 
     */
    function __construct($id, $email, $password, $pseudo,$role) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->pseudo = $pseudo;
        $this->role = $role;

    }

    
    static function isMailExist($email) {
        $DB = static::DBConnect();
        $stmt = $DB->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->execute(array($email));

        $mailReturn = $stmt->fetchAll();

        if (sizeof($mailReturn) == 0 ) return false;
        return true;
    }

    static function registerUser($email, $password, $pseudo) {
        $DB = static::DBConnect();
        $stmt = $DB->prepare('INSERT INTO user (email, password, pseudo) VALUES (?,?,?)');
        $stmt->execute(array($email, $password, $pseudo));
    }


    static function connectUser($email, $password) {
        $DB = static::DBConnect();
        
        $request_user = $DB->prepare('SELECT * FROM `user` WHERE `email` = ?');
        $request_user->execute([$email]);

        $response = $request_user->fetchAll();
       

        if(sizeof($response) == 0){
            return false;
        }

        if(!password_verify($password, $response[0]['Password'])) {
            return false;
        }

        return new User (
            $response[0]['id'],
            $response[0]['Email'],
            $response[0]['Password'],
            $response[0]['Pseudo'],
            $response[0]['role']
        );        

        
    }

}



?>