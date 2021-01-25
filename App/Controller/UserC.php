<?php
session_start();


// required models

require_once __DIR__.'/../../Core/PopUp.php';

require_once __DIR__.'/../Model/User.php';


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


            // LastName & Firstname
            if (empty($_POST['firstnameInput']) || empty($_POST['lastnameInput'])) {
                $_SESSION['popup'] = new PopUp('error', 'Le prénom et le nom de famille doivent être renseignés');
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
            $userId = User::newUser($_POST['usernameInput'], $_POST['mailInput'], $_POST['lastnameInput'], $_POST['firstnameInput'], $cryptedPwd);

            // Creation d'un code pour l'envoie du mail de confirmation
            $code = AleatoryString();

            Confirmation::setupConfirmation($code, $userId, 'account');


            $mail = new Mail;
            $mail->sendMail(['mail' => $_POST['mailInput'], 'name' => $_POST['firstnameInput'] . ' ' . $_POST['lastnameInput']], 'Merci de confirmer votre compte.', ['confirmationAccount', 'var' => $code]);


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
                header('location: /PHP/connexion');
                exit;

            }

            if (empty($_POST['pwdInput'])) {
                $_SESSION['popup'] = new PopUp('error', 'Mot de passe renseigné non valide');
                header('location: /PHP/connexion');
                exit;
            }


            $isUser = User::isUserExist($_POST['mailInput'], $_POST['pwdInput']);

            if (!$isUser) {
                $_SESSION['popup'] = new PopUp('error', 'Combinaison Email et mot de passe inconnus');
                header('location: /PHP/connexion');
                exit;
            }


            if ($isUser->getUser_status() == 0) {
                $_SESSION['popup'] = new PopUp('error', 'Votre compte doit être activé, veuillez regarder vos email.');
                header('location: /PHP/connexion');
                exit;
            }

            $_SESSION['user'] = $isUser;

            $_SESSION['popup'] = new PopUp('success', 'Vous êtes maintenant connecté');
            header('location: /PHP/');
            exit;

        }

        View::render('User/SignIn', []);


    }

}
    ?>