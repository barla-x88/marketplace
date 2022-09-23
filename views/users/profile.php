<nav>
        <a href="/" class="logo">CraftBuy</a>
        <ul>
            <li><a href="/main/marketplace" class="action">Marketplace</a></li>
            <li><a href="/main/about_us">About Us</a></li>
            <li><a href="/main/faq">FAQ</a></li>
            <li><a href="/user/logout" class="btn btn-primary btn-lg">Log Out</a></li>
        </ul>
</nav>
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
    <div class="userProducts">
        <p style="background-color: yellow;"><a href="/user/addproduct">Add a Proudct</a></p>
    </div>
<?php endif; ?>