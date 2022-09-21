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
    <form action="/user/login" method="POST">
    <div class="form-row">
        <div class="col">
        <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
    </div>
    <div class="form-row">
        <div class="col">
        <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-lg" value="Log In">
    <p>New User? <a href="/user/register">Sign Up</a></p>
    </form>
</div>