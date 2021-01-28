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

        if(isset($_SESSION['user']))
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
        if(isset($_SESSION['user']))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $_SESSION['user']->deleteUser($id);
                    $_SESSION['popup'] = new PopUp('success', 'utilisateur supprimé.');
                    header('location: /projetphp2021/admin');
                    exit;
                }
                else 
                {
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

    public function editRole()
    {

        if(isset($_SESSION['user']))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    if(isset($_POST['role']))
                    {
                        $role = $_POST['role'];
                        if(isset($role))
                        {
                            $_SESSION['user']->editRole($id,$role);
                            $_SESSION['popup'] = new PopUp('success', 'Role mis à jour.');
                            header('location: /projetphp2021/admin');
                            exit;
                        }
                    }
                    else
                    {
                        header('location: /projetphp2021/admin');
                        exit;
                    }

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

    public function editNumber()
    {
        if(isset($_SESSION['user']))
        {
            if($_SESSION['user']->getRole() == 2)

                if(!empty($_POST['nbrlove']) && isset($_POST['nbrlove']))
                {
                    if(isset($_GET['id']))
                    {
                        Post::updateLoveLimit($_GET['id'],$_POST['nbrlove']);
                        $_SESSION['popup'] = new PopUp('success', 'nombres de loves modifiés .');
                        header('location: /projetphp2021/admin');
                        exit();
                    }
                    else 
                    {
                        header('location: /projetphp2021/admin');
                        exit();
                    }

                }
                {
                    header('location: /projetphp2021/admin');
                    exit();
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
        if(isset($_SESSION['user']))
        {
            if($_SESSION['user']->getRole() ==  '2')
            {
                if(isset($_GET['id']))
                {
                    $id_post=$_GET['id'];
                    Post::deletePost($id_post);
                    $_SESSION['popup'] = new PopUp('success', 'Poste supprimé.');
                    header('location: /projetphp2021/admin');
                    exit;
                }
                else 
                {
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
        }
    }



    

}
