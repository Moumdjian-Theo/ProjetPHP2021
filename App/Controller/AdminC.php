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
                header('location: /accueil');
                exit;
            }

        }
        else
        {
            header('location: /accueil');
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
                    header('location: /admin');
                    exit;
                }
                else 
                {
                    header('location: /admin');
                    exit;
                }
                
            }
            else
            {
                header('location: /accueil');
                exit;
            }
        }
        else 
        {
            header('location: /accueil');
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
                            header('location: /admin');
                            exit;
                        }
                    }
                    else
                    {
                        header('location: /admin');
                        exit;
                    }

                }
            }
            else
            {
                header('location: /accueil');
                exit;
            }
        }
        else 
        {
            header('location: /accueil');
            exit;
        }
    }

    public function editNumber()
    {
        if(isset($_SESSION['user']))
        {
            if($_SESSION['user']->getRole() == 2)
            {

                if(!empty($_POST['nbrlove']) && isset($_POST['nbrlove']))
                {
                    if(!empty($_POST['body']) && isset($_POST['body']))
                    {
                        if(!empty($_POST['title']) && isset($_POST['title']))
                        {
                            if(isset($_GET['id']))
                            {
                                $title = $_POST['title'];
                                $text = $_POST['body'];
                                $id = $_GET['id'];
                                Post::updateBody($id,$text);
                                Post::updateLoveLimit($_GET['id'],$_POST['nbrlove']);
                                Post::updateTitle($id,$title);
                                $_SESSION['popup'] = new PopUp('success', 'Changements effectués.');
                                header('location: /admin');
                                exit();
                            }
                            else 
                            {
                                header('location: /admin');
                                exit();
                            }
                        }
                        else
                        {
                            $text = $_POST['body'];
                            $id = $_GET['id'];
                            Post::updateBody($id,$text);
                            Post::updateLoveLimit($_GET['id'],$_POST['nbrlove']); 
                            $_SESSION['popup'] = new PopUp('success', 'Changements effectués.');
                            header('location: /admin');
                            exit();
                        }
                    }
                    else
                    {
                        Post::updateLoveLimit($_GET['id'],$_POST['nbrlove']); 
                        $_SESSION['popup'] = new PopUp('success', 'Changements effectués.');
                        header('location: /admin');
                        exit();
                    }

                }

            }
            
        }
        else
        {
            header('location: /accueil');
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
                    header('location: /admin');
                    exit;
                }
                else 
                {
                    header('location: /admin');
                    exit;
                }
            }
            else
            {
                header('location: /accueil');
                exit;
            }
        }
        else 
        {
            header('location: /accueil');
        }
    }



    

}