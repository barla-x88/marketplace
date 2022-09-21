<nav>
        <a href="/" class="logo">CraftBuy</a>
        <ul>
            <li><a href="/main/marketplace" class="action">Marketplace</a></li>
            <li><a href="/main/about_us">About Us</a></li>
            <li><a href="/main/faq">FAQ</a></li>
            <li><a href="/user/logout" class="btn btn-primary btn-lg">Log Out</a></li>
        </ul>
</nav>
<table>
    <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    <tr>
        <td><?php echo $userData['username'] ?></td>
        <td><?php echo $userData['firstname'] ?></td>
        <td><?php echo $userData['lastname'] ?></td>
        <td><?php echo $userData['phone'] ?></td>
        <td><?php echo $userData['email'] ?></td>
    </tr>
</table>
<p><a href="/user/logout">Log Out</a></p>