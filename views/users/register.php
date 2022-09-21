<nav>
        <a href="/" class="logo">CraftBuy</a>
        <ul>
            <li><a href="/main/marketplace" class="action">Marketplace</a></li>
            <li><a href="/main/about_us">About Us</a></li>
            <li><a href="/main/faq">FAQ</a></li>
            <li><a href="/user"><img src="/img/site/abstract-user-flat-4.svg" alt="" width="60px"></a></li>
        </ul>
</nav>
<div class="form-container">
    <form method="POST">
    <h1>Register now! It only takes few Seconds.</h1>
    <div class="form-row">
        <div class="col">
        <input type="text" name="firstname" pattern="[a-zA-Z]+" class="form-control" placeholder="First name">
        </div>
        <div class="col">
        <input type="text" name="lastname" pattern="[a-zA-Z]+" class="form-control" placeholder="Last name">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
        <input type="tel" name="phone" pattern="[0-9]+" class="form-control" placeholder="Phone">
        </div>
        <div class="col">
        <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
        <input type="text" name="address" class="form-control" placeholder="Address">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
        <input type="text" name="state" class="form-control" placeholder="State">
        </div>
        <div class="col">
        <input type="text" name="pin" class="form-control" placeholder="Pin">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
        <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="col">
        <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="type" class="form-check-input" value="SELLER" id="register_seller">
        <label class="form-check-label" for="register_seller">Register me as a Seller</label>
    </div>
    <input type="submit" class="btn btn-primary" value="Register">
    </form>
</div>