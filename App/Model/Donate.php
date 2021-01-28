<?php

/**
 *  @title : template.php
 * @author : Théo MOUMDJIAN 
 * @author : Guillaume RISCH 
 * @author : Ousama LOURGUI
 * @author : Haitam FERTOUT
 * 
 *  @brief : Example model
 * 
 */
class Donate extends Model{

    // class vars
    // protected $var;


    /**
     *  @name : __construct
     * 
     *  @brief : constructor
     * 
     */

    private $id_user;
    private $id_post;
    private $montant;

    function __construct($id_user,$id_post,$montant) {
        $this->id_user = $id_user;
        $this->id_post = $id_post;
        $this->montant = $montant;
    }

    public function getIdUser() (
        return $this->id_user;
    )

    public function getIdPost() {
        return $this->id_post;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public static function insertNewMontant($id_post,$montant)
    {
        $DB = static::DBConnect();

        $request_montant = $DB->prepare('INSERT INTO `donation` (`id_user`,`id_post`,`montant`) VALUES (?,?,?)');
        $request_montant->execute([$_SESSION['id_user']],$id_post, $montant);

        return;
    }

    public static function getDonations()
    {
        $DB = static::DBConnect();

        $request
    }

}



?>
