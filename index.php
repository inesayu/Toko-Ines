<?php
require_once "koneksi.php";
//header("location:admin/index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container p-5 my-5" style="border-color: grey; border-style: double; border-radius: 10px; width: 450px; height: auto;">
  		<img src="assets/images/sembako.png" width="350px">
  		<hr class="my-5">
        <h2 class="text-center">LOGIN</h2><br>
        <form action="prosesLogin.php" method="post">
        	<div class="form-inline was-validated">
            	<div class="col-12 col-md-3">
              		<label for="username">Username:</label>
            	</div>
            	<div class="col-12 col-md-8">
              		<input type="text" class="form-control w-100" id="username" name="username" placeholder="Enter Your Username" autocomplete="off" required="">
    	        </div>
        	</div><br>
        	<div class="form-inline was-validated">
            	<div class="col-12 col-md-3">
              		<label for="password">Password:</label>
            	</div>
            	<div class="col-12 col-md-8">
            		<input type="password" class="form-control w-100" id="password" name="password" placeholder="Enter Your Password" required="">
            	</div>
          	</div><br>
          	<button type="submit" class="btn btn-secondary form-control">Login</button>
        </form>
	</div>
</body>
</html>