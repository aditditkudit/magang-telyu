<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menghubungkan CodeIgniter dengan database mysql</title>
</head>
<body>
    <h1>Mengenal Model pada CodeIgniter</h1>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php foreach($user as $u){ ?>
        <tr>
            <td><?php echo $u->username ?></td>
            <td><?php echo $u->password ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>