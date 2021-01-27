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
require_once(__DIR__.'/../Model/Post.php');
require_once(__DIR__.'/../Model/User.php');

// session_start ?
session_start();

 class SearchC {


    /**
     *  @name : exampleMethod
     *  @param : void
     * 
     *  @return : void
     *
     * 
     */
    public function SearchPost() {
        if(isset($_POST['searchsubmit']))
        {
            if(isset($_POST['search-data']))
            {
                if($_SESSION['user']->getRole() == 2)
                {
                    $listPost = Post::searchPostByText($_POST['search-data']);
                    View::render('Accueil/AccueilVannestarre', ['postlist' => $listPost]);
                }
                else
                {
                    $listPost = Post::searchPostByText($_POST['search-data']);
                    View::render('Accueil/Acceuil', ['postlist' => $listPost]);
                }
            }
            else 
            {
                header('location : Accueil/acceuil');
                exit;
            }

        }
        else 
        {
            header('location : Accueil/acceuil');
            exit;
        }

    }// public function createCar()

}
