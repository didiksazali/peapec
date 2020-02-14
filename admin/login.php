<!DOCTYPE html>
<html>
<link rel="stylesheet" href="assets/css/login/normalize.css" />
<link rel="stylesheet" href="assets/css/login/style.css" />
    <link rel="shortcut icon" href="assets/img/logo-pol-pp.png"/>
<head>

  <meta charset="UTF-8">

  <title>Login to Admin</title>

    <script src="assets/js/login/prefixfree.min.js"></script>

</head>

<body>

  <div class="login">
	<h1>Login</h1>
    <form method="post" action="actLogin.php">
    	<input type="text" name="txtUsername" placeholder="Username" required="required" />
        <input type="password" name="txtPassword" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Masuk</button>
    </form>
</div>

  <script src="assets/js/login/index.js"></script>

</body>

</html>