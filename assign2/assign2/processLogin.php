<?php
    session_start();
    $_SESSION['login'] = "Login";
    $_SESSION['username'] = "s103980338";
    $_SESSION['pwd'] = "swin103980338";
    function sanitise_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }

    $getvalues = True;
    //username
    if (isset($_POST["username"])){
        $username = sanitise_data($_POST["username"]);
    }
    else{
        
        echo"Error: Enter data in the <a href=\"login.php\">login page</a></p>";
        $getvalues = False;
    }

    if (isset($_POST["password"])){
        $password = sanitise_data($_POST["password"]);
    }
    else{
        
        echo"Error: Enter data in the <a href=\"login.php\">login page</a></p>";
        $getvalues = False;
    }

    if ($getvalues){
        if ($username == $_SESSION['username'] && $password==$_SESSION['pwd']){
            $_SESSION['login'] = 'Logout';
            header('Location: ../assign2/apply.php');

        }
        else{
            header('Location: ../assign2/login.php?login=false');
        }
    }


?>