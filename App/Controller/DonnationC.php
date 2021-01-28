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
require_once (__DIR__.'/../Model/Post.php');

// session_start ?
 session_start();

 class DonnationC {



    public function DisplayPage() {
    
        
            View::render('Donnation/Donnation');
       





    }// public function createCar()

}

