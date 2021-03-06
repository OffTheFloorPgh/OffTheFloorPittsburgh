<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      define('PAGE_TITLE', 'Login');
      include('../partials/head.php');
    ?>
    <title>Login | Noah Scholfield</title>
  </head>
  <body>
    <?php include('../partials/navbar.php'); ?>
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Sign In</h1>
      </div>
    </div>
    <div class="container">
      <?php
        if(!empty($_POST)) {
          require('../partials/database.php');

          // Query database and check username and password
          $sanitizedUsername = pg_escape_string($connection, $_POST['username']);
          $query = "SELECT username, password FROM OFTPUsers WHERE username = '{$sanitizedUsername}';";
          $result = pg_query($connection, $query);
          
          if(!$result || pg_num_rows($result) == 0) {
            // if username is incorrect (not found)
            $authSuccessful = false;
          } else {
            $user = pg_fetch_assoc($result);
            $authSuccessful = (password_verify($_POST['password'], $user['password'])) ? true : false; // checks the password
          }

          if($authSuccessful) {
            // Save userID and username to session and redirect
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $user['username'];
            pg_free_result($result);
            pg_close($connection);
            echo '<meta http-equiv="refresh" content="0;URL=../">'; // redirect to profile page
            die();
          } else {
            // Display error if no results are found
            echo "<h5 class=\"text-danger\">Invalid username or password!</h5>";
            pg_free_result($result);
            pg_close($connection);
          }
        }
      ?>
      <form action="" method="post">
        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Sign In</button>
        </div>
      </form>
    </div>
  </body>
</html>
