<?php
require 'vendor/autoload.php';
require 'class/covid19.php';
   $router = new AltoRouter();

   //Route vers la page d'accueil
   $router->map('GET','/ProjetSante/2/',function(){
       require 'view/home.php'; 
   });

   $router->map('POST','/ProjetSante/2/',function(){
    require 'view/home.php'; 
});

   $match = $router->match();

   if( is_array($match) && is_callable( $match['target'] ) ) 
   {
	    call_user_func_array( $match['target'], $match['params'] ); 
    } 
    else 
    {
	// no route was matched
	    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
