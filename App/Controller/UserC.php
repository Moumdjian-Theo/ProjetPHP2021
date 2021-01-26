<?php



// required models

require_once __DIR__.'/../../Core/PopUp.php';

require_once __DIR__.'/../../Core/View.php';

require_once __DIR__.'/../Model/User.php';

session_start();

class UserC
{

public function signUp()
    {
        if (isset($_POST['submit'])) {


            // mail
            if (empty($_POST['mailInput']) || !filter_var($_POST['mailInput'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['popup'] = new PopUp('error', 'Il faut saisir un mail valide.');
                header('location: /projetphp2021/SignUp');
                exit;
            }
            // Check if mail exists

            $isUser = User::isMailExist($_POST['mailInput']);


            if ($isUser !== false) {
                $_SESSION['popup'] = new PopUp('error', 'L\'adresse mail renseigné est déja utilisé.');
                header('location: /projetphp2021/SignUp');
                exit;
            }



            if (empty($_POST['passwordInput']) || empty($_POST['RpasswordInput']) || $_POST['passwordInput'] != $_POST['RpasswordInput']) {
                $_SESSION['popup'] = new PopUp('error', 'Les mots de passe ne sont pas identiques.');
                header('location: /projetphp2021/SignUp');
                exit;
            }

            $cryptedPwd = password_hash($_POST['passwordInput'], PASSWORD_BCRYPT);


            // insertion dans la base de données
            $userId = User::registerUser($_POST['mailInput'], $cryptedPwd,$_POST['usernameInput']);

            
            $_SESSION['popup'] = new PopUp('success', 'Votre compte a bien été créé, mais il n\'est pas encore actif. Pour l\'activer, veuillez vérifier vos mails.');
            header('location: /projetphp2021/SignUp');
            exit;

        }

        View::render('User/SignUp', []);

    } 
    public function signIn()
    {

        if (isset($_POST['submit'])) {

            // mail
            if (empty($_POST['mailInput']) || !filter_var($_POST['mailInput'], FILTER_VALIDATE_EMAIL)) {

                $_SESSION['popup'] = new PopUp('error', 'L\'email renseigné n\'est pas valide !');
                header('location: /projetphp2021/signin');
                exit;

            }

            if (empty($_POST['pwdInput'])) {
                $_SESSION['popup'] = new PopUp('error', 'Mot de passe renseigné non valide');
                header('location: /projetphp2021/signin');
                exit;
            }


            $isUser = User::connectUser($_POST['mailInput'], $_POST['pwdInput']);

            if (!$isUser) {
                $_SESSION['popup'] = new PopUp('error', 'Combinaison Email et mot de passe inconnus');
                header('location: /projetphp2021/signin');
                exit;
            }


            

            $_SESSION['user'] = $isUser;

            $_SESSION['popup'] = new PopUp('success', 'Vous êtes maintenant connecté');
            header('location: /projetphp2021/Accueil');
            exit;

        }

        View::render('User/SignIn', []);


    }

    public function editProfile(){
    if(!empty($_POST)){
        if(isset($_POST['action'])){
            if($_POST['action'] == 'Modifier le pseudo'&& isset($_POST['newPseudo']) && !empty($_POST['newPseudo'])
            && $_POST['newPseudo'] != $_SESSION['user']->getPseudo()){

                User::updatePseudo($_POST['newPseudo'], $_SESSION['user']->getId());

                $_SESSION['popup'] = new PopUp('success', 'Votre pseudo a bien été modifié.');
                header('location: /projetphp2021/editprofile');
                exit();
            }
            
            
        }
        if ($_POST['action'] == 'Modifier le mail' && isset($_POST['newEMail']) && !empty($_POST['newEMail'])) {

            if (!filter_var($_POST['newEMail'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['popup'] = new PopUp('error', 'Veuillez saisir un mail valide.');
                header('location: /projetphp2021/editprofile');
                exit();
            }

                User::updateMail($_POST['newEMail'], $_SESSION['user']->getUser_id());


                $_SESSION['popup'] = new PopUp('success', 'Le mail a bien été modifiée.');
                header('location: /projetphp2021/editprofile');
                exit();
            }
        
            if ($_POST['action'] == 'Modifier le mot de passe' && isset($_POST['newPwd'], $_POST['pwdVerif'])
            && !empty($_POST['newPwd']) && !empty($_POST['pwdVerif'])) {

                if ($_POST['newPwd'] != $_POST['pwdVerif']) {
                    $_SESSION['popup'] = new PopUp('error', 'Les mots de passe ne sont pas identiques.');
                    header('location: /projetphp2021/editprofile');
                    exit;
                }

                $cryptedPwd = password_hash($_POST['newPwd'], PASSWORD_BCRYPT);
                User::updatePassword($cryptedPwd, $_SESSION['user']->getId());

                $_SESSION['popup'] = new PopUp('success', 'Le mot de passe a bien été modifié.');
                header('location: /projetphp2021/editprofile');
                exit();
            }

        }
        View::render('User/EditProfile', []);
    }
    


}
    ?>