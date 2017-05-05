<?php


$route = new Zend_Controller_Router_Route(
    'product',
    array(
        'controller' => 'ProductController',
        'action'     => 'index'
    )
);

$router->addRoute('product', $route);


$route = new Zend_Controller_Router_Route(
    'cart',
    array(
        'controller' => 'CartController',
        'action' => 'index'
    )
);

$router->addRoute('cart', $route);






