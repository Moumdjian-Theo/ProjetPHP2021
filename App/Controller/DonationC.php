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

 class DonationC {



    public function DisplayPage() {
    
        
            View::render('Donation/Donation');
       





    }// public function createCar()

}

