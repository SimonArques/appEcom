<?php

//Route vers la page produits
$route = new Zend_Controller_Router_Route(
    'product',
    array(
        'controller' => 'ProductController',
        'action'     => 'index'
    )
);

$router->addRoute('product', $route);


//Route vers la page Login
$route = new Zend_Controller_Router_Route(
    'Login',
    array(
        'controller' => 'Login',
        'action' => 'login'
    )
);

$router->addRoute('login', $route);






