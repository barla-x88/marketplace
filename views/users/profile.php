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