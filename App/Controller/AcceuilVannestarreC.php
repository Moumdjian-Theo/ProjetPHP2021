<?php


/**
 * 
 *  @name : templateC.php
 * @author : Théo MOUMDJIAN 
 * @author : Guillaume RISCH 
 * @author : Ousama LOURGUI
 * @author : Haitam FERTOUT
 *  
 *  @brief :  Example controller pages
 * 
 * 
 */



// required models

require_once __DIR__.'/../../Core/PopUp.php';

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
        View::render('Accueil/Accueil', []);

    }// public function createCar()

}

