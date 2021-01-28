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

    static function getUsers()
    {
        $DB = static::DBConnect();
        
        $request_user = $DB->prepare('SELECT * FROM `user`');
        $request_user->execute();

        $response = $request_user->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        $listUser = [];

        for($i = 0; $i < sizeof($response); ++$i)
        {
            array_push($listUser, new User(
                $response[$i]['id'],
                $response[$i]['Email'],
                $response[$i]['Password'],
                $response[$i]['Pseudo'],
                $response[$i]['role']
            ));
        }

        return $listUser;

    }

    public function editRole($id,$role)
    {
        $DB = static::DBConnect();

        $request_role = $DB->prepare('UPDATE `user` SET `role` = ? WHERE `id` = ?');
        $request_role->execute([$role,$id]);

        return;
    }

    public function deleteUser($id_user)
    {
        $DB = static::DBConnect();
        
        $request_user = $DB->prepare('DELETE FROM `user` WHERE id =?');
        $request_user->execute([$id_user]);

        return;
    }

    public static function updatePseudo($newPseudo,$id ) {
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE `user` SET `Pseudo` = ? WHERE `id` = ?');
        $stmt->execute([$newPseudo, $id]);

        return;
    }

    public static function updateMail($newEmail, $id) 
    {
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE `user` SET `Email` = ? WHERE `id` = ?');
        $stmt->execute([$newEmail, $id]);

        return;
    }

    public static function updatePassword($newPassword, $id) 
    {
        $DB = static::DBConnect();

        $stmt = $DB->prepare('UPDATE `user` SET `Password` = ?  WHERE `id` = ?');

        $stmt->execute([$newPassword, $id]);

        return;
    }

    public static function getUserCount()
    {
        $DB = static::DBConnect();

        $request_user = $DB->query("SELECT COUNT(*) FROM `user`");
        $count = $request_user->fetchColumn();
        return $count;
    }





    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getMail(){
        return $this->email;
    }

    public function setMail($email){
        $this->mail = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo =$pseudo;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }


}



?>