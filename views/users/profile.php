<nav>
        <a href="/" class="logo">CraftBuy</a>
        <ul>
            <li><a href="/main/marketplace" class="action">Marketplace</a></li>
            <li><a href="/main/about_us">About Us</a></li>
            <li><a href="/main/faq">FAQ</a></li>
            <li><a href="/user/logout" class="btn btn-primary btn-lg">Log Out</a></li>
        </ul>
</nav>
<div class="page-container">
    <div class="profile">
        <div class="user-img">
        <div class="circle"><?php echo substr($userData['firstname'], 0, 1) ?></div>
        <p>
            <?php echo $userData['firstname']. " " . $userData['lastname']?><br>
            Phone - <?php echo $userData['phone'] ?>
        </p>
        </div>
        <div class="user-details">
            <h1>USER PROFILE</h1>
            <p>
                <span class="name">
                    Name - <?php echo $userData['firstname']. " " . $userData['lastname']?><br>
                </span>
                <span class="phone">
                    Phone - <?php echo "+91 " . $userData['phone']?><br>
                </span>
                <span class="email">
                    Email - <a href="mailto:<?php echo $userData['email']?>"><?php echo $userData['email'] ?></a><br>
                </span>
                <span class="address">
                    Address - <?php echo $userData['address']?><br>
                </span>
                <span class="state">
                    State - <?php echo $userData['state']?><br>
                </span>
                <span class="pin">
                    Pin - <?php echo $userData['pin']?><br>
                </span>
                <span class="type">
                    User Type - <?php echo $userData['type']?><br>
                </span>
            </p>
        </div>
    </div>
<?php if($_SESSION['userType'] === 'SELLER'): ?>
    <div class="user-products">
        <h2>My Products</h2>
        <div class="products-container">
            <?php if (empty($userProducts)): ?>
                <p style="font-size: 22px; min-height: 20vh; display: flex; align-items: center;">Opps.. 🦉️ no products, Start adding one.</p>
            <?php endif; ?>
            <?php if(!empty($userProducts)): ?>
                <?php foreach($userProducts as $product): ?>
                    <div class="product">
                        <p><img src="/<?php echo $product['product_image'] ?>" alt="" width="130px"></p>
                        <p>Product Name - <?php echo $product['product_name'] ?></p>
                        <p>Price - <?php echo $product['product_price'] ?></p>
                        <p>Category - <?php echo $product['product_category'] ?></p>
                        <p>Date Added - <?php echo $product['product_date'] ?></p>
                        <form action="/user/deletproduct" method="POST">
                            <input type="hidden" value="<?php echo $product['product_id'] ?>">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?> 
        </div>
            <?php if($_SESSION['userType'] === 'SELLER'): ?>
                    <a class="btn btn-success" href="/user/addproduct">Add a Proudct</a>
            <?php endif; ?>
    </div>
<?php endif; ?>
</div>

