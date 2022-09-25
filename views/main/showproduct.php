<nav>
        <a href="/" class="logo">CraftBuy</a>
        <ul>
            <li><a href="/main/marketplace" class="action">Marketplace</a></li>
            <li><a href="/main/about_us">About Us</a></li>
            <li><a href="/main/faq">FAQ</a></li>
            <li><a href="/user"><img src="/img/site/abstract-user-flat-4.svg" alt="" width="60px"></a></li>
        </ul>
</nav>
<div class="products-container">
    <div class="product-img">
        <div>
            <img src="/<?php echo $product['product_image']?>" alt="" width="400px"><br>
            <p>Product Image</p>
        </div>
    </div>
    <div class="product-info">
        <p><span>Product Name</span><?php echo $product['product_name']?></p>
        <p><span>Product Description</span><?php echo $product['product_desc']?></p>
        <p><span>Product Price</span><?php echo $product['product_price']?></p>
        <p><span>Product Category</span><?php echo $product['product_category']?></p>
        <p>
            <span>Contact Seller</span>Seller Name - <?php echo $seller_info['firstname'] . " " . $seller_info['lastname']?><br>
            Phone- <?php echo $seller_info['phone']?><br>
            Email- <a href="mailto:<?php echo $seller_info['email']?>"><?php echo $seller_info['email']?></a><br>
            Address- <?php echo $seller_info['address']?>, State - <?php echo $seller_info['state']?>, 
            Pin - <?php echo $seller_info['pin']?>
        </p>
    </div>
</div>