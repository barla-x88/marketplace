<?php 

namespace app\controllers;

use app\controllers\UserController;
use app\Router;

//handle operations for all users
class MainController {
    public static function index(Router $router) {
        $router->renderView('main/index');
    }
    
    public static function marketplace(Router $router, $searchString = '') {
        

        //getting all the products
        $allProducts = $router->dbConnection->getProductsBySeller();

        //sets the number of displayed products on one page
        $allProducts = array_chunk($allProducts, 6);
      
        $currentPage = null;

        //get the current page number
        if (isset($_SERVER['QUERY_STRING'])) {
            $currentPage = (int) explode('=', $_SERVER['QUERY_STRING'])[1];
        }
        
        $pageContent = $currentPage ? $allProducts[$currentPage - 1] : $allProducts[0];
        $pageCount = count($allProducts);
    
        $router->renderView('main/marketplace', ['pageCount' => $pageCount, 'currentPage' => $currentPage, 'pageContent' => $pageContent]);
    }
}