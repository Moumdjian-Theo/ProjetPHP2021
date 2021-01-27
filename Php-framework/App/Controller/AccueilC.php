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
        $listPost = Post::getPosts();
        if($_SESSION['user']->getRole() == 2)
        {
            View::render('Accueil/AccueilVannestarre', ['postlist' => $listPost]);
        }
        else
        {
            View::render('Accueil/Acceuil', ['postlist' => $listPost]);
        }





    }// public function createCar()

}

