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
// require_once(__DIR__.'/../../Core/PopUp.php');

// session_start ?


require_once (__DIR__.'/../Model/User.php');
require_once (__DIR__.'/../Model/Post.php');
session_start();

 class AdminC {


    /**
     *  @name : exampleMethod
     *  @param : void
     * 
     *  @return : void
     *
     * 
     */
    public function verificateRole() {

        if(isset($_SESSION))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                $listUser = User::getUsers();
                $listPost = Post::getPosts();
                $countPost = Post::getPostCount();
                $countUser = User::getUserCount();
                View::render('Admin/admin',['userlist' => $listUser, 'postlist' => $listPost,'postcount' => $countPost,'usercount' => $countUser]); 
            }
            else
            {
                header('location: /projetphp2021/accueil');
                exit;
            }

        }
        else
        {
            header('location: /projetphp2021/accueil');
            exit;
        }

    }// public function createCar()

    public function deleteUser()
    {
        if(isset($_SESSION))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                $id = $_GET['id'];
                $_SESSION['user']->deleteUser($id);
                header('location: /projetphp2021/admin');
                exit;
            }
            else
            {
                header('location: /projetphp2021/accueil');
                exit;
            }
        }
        else 
        {
            header('location: /projetphp2021/accueil');
            exit;
        }
    }

    public function editRole()
    {

        if(isset($_SESSION))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                $id = $_GET['id'];
                $role = $_POST['role'];
                if(isset($role))
                {

                    echo " ".$role;
                    $_SESSION['user']->editRole($id,$role);
                    header('location: /projetphp2021/admin');
                    exit;
                }

            }
            else
            {
                header('location: /projetphp2021/accueil');
                exit;
            }
        }
        else 
        {
            header('location: /projetphp2021/accueil');
            exit;
        }
    }

    public function deletePost()
    {
        if(isset($_SESSION))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                $id_post=$_GET['id'];
                Post::deletePost($id_post);
                header('location: /projetphp2021/admin');
                exit;
            }
            else
            {
                header('location: /projetphp2021/accueil');
                exit;
            }
        }
        else 
        {
            header('location: /projetphp2021/accueil');
        }
    }



    

}
