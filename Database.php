<?php

namespace app;

use app\models\product\Product;
use app\models\user\User;
use PDO;

class Database {
    public PDO $pdo;

    //this will be used in product class for adding and updating product
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=marketplace', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function validateUser($username, $password) {
        $statement = $this->pdo->prepare('SELECT password FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        $resultArr = $statement->fetch(PDO::FETCH_ASSOC);
       
        $storedPassword = $resultArr['password'];
        if (password_verify($password, $storedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserData(string $username) : array {
        $statement = $this->pdo->prepare('SELECT username, phone, email, firstname, lastname, address, state, pin, type FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
       
        return $userData;
    }

    public function addUser(User $newUser) {

        $statement = $this->pdo->prepare("INSERT INTO users (username, firstname, lastname, password, phone, email, address, state, pin, type) VALUES (:username, :firstname, :lastname, :password, :phone, :email, :address, :state, :pin, :type)");

        $statement->bindValue(':username', $newUser->username);
        $statement->bindValue(':firstname', $newUser->firstname);
        $statement->bindValue(':lastname', $newUser->lastname);
        $statement->bindValue(':password', $newUser->password);
        $statement->bindValue(':phone', $newUser->phone);
        $statement->bindValue(':email', $newUser->email);
        $statement->bindValue(':address', $newUser->address);
        $statement->bindValue(':state', $newUser->state);
        $statement->bindValue(':pin', $newUser->pin);
        $statement->bindValue(':type', $newUser->type);

        // Execute the prepared statement.
        $statement->execute();
    }

    public function addNewProduct(Product $product) {
        $statement = $this->pdo->prepare("INSERT INTO products (product_id, product_name, seller_id, product_desc, product_image, product_price, product_category, product_date, product_promoted) VALUES (Null, :product_name, :seller_id, :product_desc, :product_image, :product_price, :product_category, :product_date, :product_promoted)");

        $statement->bindValue(':product_name', $product->product_name);
        $statement->bindValue(':seller_id', $product->seller_id);
        $statement->bindValue(':product_desc', $product->product_desc);
        $statement->bindValue(':product_image', $product->product_image);
        $statement->bindValue(':product_price', $product->product_price);
        $statement->bindValue(':product_category', $product->product_category);
        $statement->bindValue(':product_date', $product->product_date);
        $statement->bindValue(':product_promoted', $product->product_promoted);


        // Execute the prepared statement.
        $statement->execute();
    }

    public function updateProduct(Product $product) {

    }

    public function deleteProduct($id) {
        
    }

    //can also be used to get all the products from all sellers
    public function getProductsBySeller(string $seller=''): array {
        
        if ($seller) {
            $statement = $this->pdo->prepare('SELECT product_id, product_name, seller_id, product_desc, product_image, product_price, product_category, product_date FROM products WHERE seller_id = :seller_id');
            $statement->bindValue(':seller_id', $seller);
        } else {
            $statement = $this->pdo->prepare('SELECT product_id, product_name, seller_id, product_desc, product_image, product_price, product_category, product_date FROM products'); 
        }

        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
       
        return $products;

    }
}