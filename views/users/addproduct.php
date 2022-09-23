<nav>
        <a href="/" class="logo">CraftBuy</a>
        <ul>
            <li><a href="/main/marketplace" class="action">Marketplace</a></li>
            <li><a href="/main/about_us">About Us</a></li>
            <li><a href="/main/faq">FAQ</a></li>
            <li><a href="/user/logout" class="btn btn-primary btn-lg">Log Out</a></li>
        </ul>
</nav>
<div class="form-container">
    <form method="POST" enctype="multipart/form-data">
    <h1>Add a new Product</h1>
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="e.g. Mushroom" pattern="[a-zA-Z0-9]+" maxlength="30" required>
    </div>
    <div class="form-group">
        <label for="product_desc">Product Description</label>
        <textarea class="form-control" id="product_desc" name="product_desc" rows="3" placeholder="e.g. Organically Proudced Mushrooms" maxlength="1500" required></textarea>
    </div>
    <div class="form-group">
        <label for="product_category">Select Product Category</label>
        <select class="custom-select" id="product_category" name="product_category">
            <option value="edibles">Edibles</option>
            <option value="arts&crafts">Arts & Crafts</option>
            <option value="other">Others</option>
        </select>
    </div>
    <div class="form-group">
        <label for="product_imgFile">Product Image</label>
        <input type="file" class="form-control-file" id="product_imgFile" name="product_imgFile" accept="image/png, image/jpeg">
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="e.g. 10.5" maxlength="10" pattern="[0-9.]+" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Add Product">
    </form>
</div>