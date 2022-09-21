<?php 

namespace app\controllers;

use app\controllers\UserController;
use app\Router;

//handle operations for all users
class MainController {
    public static function index(Router $router) {
        $router->renderView('main/index');
    }
    
    public static function marketplace(Router $router) {

        //getting all the products
        $dummyArray = [['product' => 'product1'],['product' => 'product2'],['product' => 'product3']];

        $currentPage = null;

        //get the current page number
        if (isset($_SERVER['QUERY_STRING'])) {
            $currentPage = (int) explode('=', $_SERVER['QUERY_STRING'])[1];
        }
        
        $pageContent = $currentPage ? $dummyArray[$currentPage - 1] : $dummyArray[0];
        $pageCount = count($dummyArray);
    
        $router->renderView('main/marketplace', ['pageCount' => $pageCount, 'currentPage' => $currentPage, 'pageContent' => $pageContent]);
    }
}