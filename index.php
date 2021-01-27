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
$Router->add('/projetphp2021/accueil',['controller' => 'AccueilC@DisplayPage' ]);

$Router->add('/projetphp2021/signup',['controller' => 'UserC@SignUp']);
$Router->add('/projetphp2021/signin',['controller' =>'UserC@SignIn']);
$Router->add('/projetphp2021/admin',['controller' =>'AdminC@verificateRole']);
$Router->add('/projetphp2021/deleteuser.php',['controller' => 'AdminC@deleteUser']);
$Router->add('/projetphp2021/edit.php',['controller' => 'AdminC@editRole']);
$Router->add('/projetphp2021/deletepost.php',['controller' =>'AdminC@deletePost']);
$Router->add('/projetphp2021/deconnexion',['controller' =>'UserC@deconnexion']);
$Router->add('/projetphp2021/editprofil',['controller' =>'UserC@EditProfile']);
$Router->add('/projetphp2021/createpost',['controller' =>'PostC@CreatePost']);
$Router->add('/projetphp2021/searchpost',['controller' =>'SearchC@SearchPost']);


/**
 * How to add a route :
 * $router->add(URL, ['controller' => ControllerPage@MethodName]);
 */

// Initialize Controller
$Router->initialize();

?>
