<?php


/**
 * 
 *  @name : templateC.php
 *  
 *  @brief :  Example controller pages
 * 
 * 
 */

// required models

require_once __DIR__.'/../../Core/PopUp.php';
require_once __DIR__.'/../Model/User.php';

// session_start ?
 session_start();

 class AccueilC {


    /**
     *  @name : exampleMethod
     *  @param : void
     * 
     *  @return : void
     *
     * 
     */
    public function DisplayPage() {
        View::render('Accueil/Acceuil', []);

    }// public function createCar()

}

