<?php



// required models

require_once __DIR__.'/../../Core/PopUp.php';

require_once __DIR__.'/../../Core/View.php';

require_once __DIR__.'/../Model/User.php';

require_once __DIR__.'/../Model/Post.php';

session_start();

class PostC {
    public function CreatePost() 
    {

        if(isset($_SESSION['user']))
        {
            if($_SESSION['user']->getRole() =='2'){

            
                if(!empty($_POST)){
                    if(isset($_POST['action'])){
                        if(!empty($_POST['title']) && !empty($_POST['text'])){
                        
                            Post::insertNewPost($_SESSION['user']->getId(),$_POST['title'],$_POST['img'],$_POST['text'],date("Y-m-d H:i:s"),0,0,0,0,$_POST['tag']);

                            $_SESSION['popup'] = new PopUp('success', 'Votre poste a bien été crée.');
                    header('location: /projetphp2021/createpost');
                            
                        }
                    }

                }
            
            
            View::render('CreatePost/CreatePost', []);
            }
        }
        else 
        {
            header('location: /projetphp2021/signin');
        }
    }

    public function incrementer()
    {
        if(isset($_SESSION['user']))
        {
            if(isset($_POST['button1']))
            {
                if(isset($_GET['id']))
                {
                    if(!Post::isInserted($_SESSION['user']->getId(),$_GET['id']))
                    {
                        Post::incrementCute($_GET['id']);
                        Post::insertCuteUser($_SESSION['user']->getId(),$_GET['id']);
                        header('location: accueil');
                        exit();
                    }
                    else
                    {
                        header('location: accueil');
                        exit();
                    }

                }
                
            }
            if(isset($_POST['button2']))
            {
                if(isset($_GET['id']))
                {
                    if(!Post::isInserted($_SESSION['user']->getId(),$_GET['id']))
                    {
                        Post::incrementTrop_stylé($_GET['id']);
                        Post::insertTrop_styléUser($_SESSION['user']->getId(),$_GET['id']);
                        header('location: accueil');
                        exit();
                    }
                    else
                    {
                        header('location: accueil');
                        exit();
                    }

                }
            }
            if(isset($_POST['button3']))
            {
                if(isset($_GET['id']))
                {
                    if(!Post::isInserted($_SESSION['user']->getId(),$_GET['id']))
                    {
                        Post::incrementLove($_GET['id']);
                        Post::insertLoveUser($_SESSION['user']->getId(),$_GET['id']);
                        header('location: accueil');
                        exit();
                    }
                    else
                    {
                        header('location: accueil');
                        exit();
                    }

                }
            }
            if(isset($_POST['button4']))
            {
                if(isset($_GET['id']))
                {
                    if(!Post::isInserted($_SESSION['user']->getId(),$_GET['id']))
                    {
                        Post::incrementSwag($_GET['id']);
                        Post::insertSwagUser($_SESSION['user']->getId(),$_GET['id']);
                        header('location: accueil');
                        exit();
                    }
                    else
                    {
                        header('location: accueil');
                        exit();
                    }

                }
            }
            
        }
        else 
        {
            header('location: signin');
            exit();
        }
    }


}
