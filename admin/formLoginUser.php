<?php
require_once "../koneksi.php";
?>
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