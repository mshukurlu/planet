<html>
<head>

</head>
<body>
<form action="" method="POST">
    <?php include_view('errors'); ?>
    <p>Login </p>
    <p><input name="email" type="text" value=""></p>
    <p>Password</p>
    <p><input type="password" name="password"></p>
    <button>Log in</button>
    <?= csrf_field() ?>
</form>
</body>
</html>
