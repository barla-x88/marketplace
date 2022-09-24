<?php

namespace app\models\product;

use app\Database;

class Product {
    public ?int $product_id;
    public string $product_name;
    public string $seller_id;
    public string $product_desc;
    public ?array $imgFile;
    public string $product_image;
    public float $product_price;
    public string $product_category;
    public string $product_date;
    public bool $product_promoted = false;

    public function __construct(array $product_data)
    {
        $this->product_id = $product_data['product_id'] ?? null;
        $this->product_name = $product_data['product_name'];
        $this->seller_id = $product_data['seller_id'];
        $this->product_desc = $product_data['product_desc'];
        
        $this->imgFile = $product_data['product_imgFile'] ?? null;
        
        $this->product_image = $product_data['product_image'] ?? '';

        $this->product_price = $product_data['product_price'];
        $this->product_category = $product_data['product_category'];
        $this->product_date = date('Y-m-d H:i:s');
    }

    public function saveProduct(bool $update) {

        $currentSeller = $this->seller_id;
        $productName = str_replace(' ', '', $this->product_name);

        //create a directory for user if it doesn't exist
        if (!is_dir(__DIR__ . "/../../public/img/site/userImg/$currentSeller")) {
            $created = mkdir(__DIR__ . "/../../public/img/userImg/$currentSeller");
        }

        //create a dir for product if doesn't exist
        if (!is_dir(__DIR__ . "/../../public/img/site/userImg/$currentSeller" . "/$productName")) {
            mkdir(__DIR__ . "/../../public/img/userImg/$currentSeller" . "/$productName");
        }

        if ($this->imgFile && $this->imgFile['tmp_name']) {

            //used for editing the product
            if ($this->product_image) {
                unlink(__DIR__ . "/../../public/" . $this->product_image);
            }

            $this->product_image = "img/userImg/$currentSeller" . "/$productName/" . str_replace(' ', '', basename($this->imgFile['name']));
            move_uploaded_file($this->imgFile['tmp_name'], __DIR__ . "/../../public/" . $this->product_image);
        }

        // $db = Database::$db;

        // if ($update) {
        //     $db->addNewProduct($this);
        // } else {
        //     $db->updateProduct($this); 
        // }
    }
}