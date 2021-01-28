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
                if($_POST['search-data'][0]== 'β')
                {
                    
                    $listPost = Post::searchPostByTag($_POST['search-data']);
                    View::render('Accueil/AccueilVannestarre', ['postlist' => $listPost]);     
                }
                else
                {
                    $listPost = Post::searchPostByTag($_POST['search-data']);
                    View::render('Accueil/Accueil', ['postlist' => $listPost]);
                }
            }
            else 
            {
                header('location : Accueil/Accueil');
                exit;
            }

        }
        else 
        {
            header('location : Accueil/Accueil');
            exit;
        }

    }

}
