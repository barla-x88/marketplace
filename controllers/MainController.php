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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['q'])) {
            $allProducts = $router->dbConnection->searchProduct($_POST['q']);
        } else {

            $allProducts = $router->dbConnection->getProductsBySeller();
        }

        //sets the number of displayed products on one page
        $allProducts = array_chunk($allProducts, 6);
      
        $currentPage = null;

        //get the current page number
        if (isset($_SERVER['QUERY_STRING'])) {
            $currentPage = (int) explode('=', $_SERVER['QUERY_STRING'])[1];
        }
        
        // $pageContent = $currentPage ? $allProducts[$currentPage - 1] : $allProducts[0];

        $pageContent = null;
        if ($currentPage) {
            $pageContent = $allProducts[$currentPage - 1];
        } else {
            if (!empty($allProducts)) {
                $pageContent = $allProducts[0];
            }
        }
        
        $pageCount = count($allProducts);
    
        $router->renderView('main/marketplace', ['pageCount' => $pageCount, 'currentPage' => $currentPage, 'pageContent' => $pageContent]);
    }


    public static function showProduct(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = (int) $_POST['product_id'] ?? null;
            if ($productId >= 0) {

                //get product
                $product = $router->dbConnection->getProductById($productId);

                //get seller info
                $seller_info = $router->dbConnection->getUserData($product['seller_id']);
             
                $router->renderView('main/showproduct', ['product' => $product, 'seller_info' => $seller_info]);
            }
        }
    }
}