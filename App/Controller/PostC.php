<?php



// required models

require_once __DIR__.'/../../Core/PopUp.php';

require_once __DIR__.'/../../Core/View.php';

require_once __DIR__.'/../Model/User.php';

require_once __DIR__.'/../Model/Post.php';

session_start();

class PostC {
    public function CreatePost() {

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
}
