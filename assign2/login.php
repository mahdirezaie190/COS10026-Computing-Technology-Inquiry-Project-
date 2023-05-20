<!DOCTYPE HTML>
<HTML lang="en">

<?php 
$title="Website Enhancements";
include 'header.inc';
?> 

<body>

<?php 
include 'menu.inc';
?> 
 
<h2 id="login">Login</h2>
<form class="login" method = "post" action="https://mercury.swin.edu.au/cos10026/s104356422/assign2/processEOI.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<?php
include 'footer.inc';
?>

  </body>
</html>