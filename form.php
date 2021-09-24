<!DOCTYPE html>
<html>
<head>
     <title>LOGIN</title>
     <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

     <form action="login.php" method="post">
          <center>
     	<h3>LOGIN</h3>
          </center>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
     </body>
     </html>
