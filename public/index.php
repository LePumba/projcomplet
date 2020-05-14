<?php
require_once __DIR__ . '/../vendor/autoload.php';

if(!isset($_GET['controller']) || empty($_GET['controller'])) {
    require './view/home.php';
}
else {
    switch(strtolower($_GET['controller'])) {
        case 'admincontroller':
            header('Location: /admin');
            break;

        default:
            require './view/home.php';
    }
}
