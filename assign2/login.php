
<?php 
session_start();
$title="Website Enhancements";
include 'header.inc';
?> 

<body>

<?php 
include 'menu.inc';
?>
<div class="login-container">
<div class="login-title">
  <h2>Login</h2>
</div>
<form class="login-form" method = "post" action="https://mercury.swin.edu.au/cos10026/s104356422/assign2/processLogin.php">
  <?php 
    $fullURL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullURL, "login=false")==  true){
        echo"
          <p id='login-msg'>Invalid username or password</p>";
    }
  ?>
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required><br><br>
  

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br><br>

  <input type="submit" value="Login">
</form>
</div>

<?php
include 'footer.inc';
?>

  </body>
</html>

