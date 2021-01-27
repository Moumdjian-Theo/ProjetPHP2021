<?php
/**
 *  @title : index.php
 * 
 *  @brief : Routing table & start page
 */
 

// require Core files
require_once('./Core/Model.php');
require_once('./Core/View.php');
require_once('./Core/PopUp.php');

// Router
require_once('./Core/Router.php');
$Router = new Router;


/**
 *  Add your routes here
 */
$Router->add('/projetphp2021/accueil',['controller' => 'AccueilC@displayPost']);

$Router->add('/projetphp2021/signup',['controller' => 'UserC@SignUp']);
$Router->add('/projetphp2021/signin',['controller' =>'UserC@SignIn']);
$Router->add('/projetphp2021/editprofile',['controller' =>'UserC@EditProfile']);
$Router->add('/projetphp2021/createpost',['controller' =>'PostC@CreatePost']);


/**
 * How to add a route :
 * $router->add(URL, ['controller' => ControllerPage@MethodName]);
 */

// Initialize Controller
$Router->initialize();


?>
