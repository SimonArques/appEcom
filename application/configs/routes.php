<?php


$route = new Zend_Controller_Router_Route(
    'product',
    array(
        'controller' => 'ProductController',
        'action'     => 'index'
    )
);


$router->addRoute('product', $route);