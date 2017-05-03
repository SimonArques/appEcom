<?php


$route = new Zend_Controller_Router_Route(
    'author',
    array(
        'controller' => '>ProductController',
        'action'     => 'index'
    )
);

$router->addRoute('author', $route);