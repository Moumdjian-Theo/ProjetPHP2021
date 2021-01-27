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
require_once __DIR__.'/../Model/Post.php';

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

    }

    Public function displayPost(){
        
        $posts = Post::getPost();
        
        
        View::render('Accueil/Acceuil', []);
    }
    


}

