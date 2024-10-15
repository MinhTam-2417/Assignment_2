<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".//assets/style/login.css">
    <title>Document</title>
</head>

<body>
    <h1 style="padding: 50px;" >Admin Login</h1>
    <form action="index.php?route=admin/login" method="POST">
        <table>
            <tr>
                <td>User name</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Login</button>
    </form>
</body>

</html>