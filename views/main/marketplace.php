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
    <?php
    $alert = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($pageContent)) {
        $alert = 'Opps.. 🦉️ No results found for your search term';
    } else {
        $alert = "Opps.. 🦉️ Currently there are no products for Sale<br> Check back Later.";
    }
    ?>
    <?php if (empty($pageContent)): ?>
        <p class="alert" style="font-size: 22px; min-height: 20vh; display: flex; align-items: center;"><?php echo $alert ?></p>
    <?php endif; ?>
    <?php if(!empty($pageContent)): ?>
        <?php foreach($pageContent as $product): ?>
            <div class="product">
                <p><img src="/<?php echo $product['product_image'] ?>" alt="" width="130px"></p>
                <p>Product Name - <?php echo $product['product_name'] ?></p>
                <p>Price - <?php echo $product['product_price'] ?></p>
                <p>Category - <?php echo $product['product_category'] ?></p>
                <p>Date Added - <?php echo $product['product_date'] ?></p>
                <form action="/main/showproduct" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                    <input type="submit" class="btn btn-primary" value="Show Product">
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?> 
</div>
<div class="pagination">
    <?php for ($i = 0; $i < $pageCount; $i++): ?>
        <button <?php echo ($currentPage === $i + 1) ? 'disabled' : ''?>>
            <a
                <?php $page = $i + 1 ?>
                <?php if($currentPage !== $i + 1): ?>
                    <?php echo "href='?page=" . "$page'"; ?>
                <?php endif; ?>>
                <?php echo "Page $page"; ?>
                </a>
        </button>
    <?php endfor; ?>
</div>
