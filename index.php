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
$Router->add('/accueil',['controller' => 'AccueilC@DisplayPage' ]);

$Router->add('/signup',['controller' => 'UserC@SignUp']);
$Router->add('/signin',['controller' =>'UserC@SignIn']);
$Router->add('/admin',['controller' =>'AdminC@verificateRole']);
$Router->add('/delete/deleteuser.php',['controller' => 'AdminC@deleteUser']);
$Router->add('/edit/edituser.php',['controller' => 'AdminC@editRole']);
$Router->add('/edit/editpost.php',['controller' => 'AdminC@editNumber']);
$Router->add('/delete/deletepost.php',['controller' =>'AdminC@deletePost']);
$Router->add('/deconnexion',['controller' =>'UserC@deconnexion']);
$Router->add('/editprofile',['controller' =>'UserC@EditProfile']);
$Router->add('/createpost',['controller' =>'PostC@CreatePost']);
$Router->add('/searchpost',['controller' =>'SearchC@SearchPost']);
$Router->add('/incrementer.php',['controller' =>'PostC@incrementer']);
$Router->add('/donation',['controller' =>'DonationC@DisplayPage']);
$Router->add('',['controller'=>'AccueilC@DisplayPage']);



/**
 * How to add a route :
 * $router->add(URL, ['controller' => ControllerPage@MethodName]);
 */

// Initialize Controller
$Router->initialize();

?>
