<?php



// required models

require_once __DIR__.'/../../Core/PopUp.php';

require_once __DIR__.'/../../Core/View.php';

require_once __DIR__.'/../Model/User.php';

require_once __DIR__.'/../Model/Post.php';

session_start();

class PostC {
    public function CreatePost() {
        
            if(!empty($_POST)){
                if(isset($_POST['action'])){
                    if(!empty($_POST['title']) && !empty($_POST['text'])){
                       
                        Post::insertNewPost($_POST['title'],$_POST['text'],$_POST['img']);

                        $_SESSION['popup'] = new PopUp('success', 'Votre Poste a bien été crée.');
                        header('location: /projetphp2021/createpost');
                        exit();
                    }
                }

            }
        

        View::render('CreatePost/CreatePost', []);

    }
    
}