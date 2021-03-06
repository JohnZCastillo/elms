<?php
    session_start();

     //if already login then redirect to autheticate.php
     echo($_SESSION['id']);
     if(isset($_SESSION['id'])){
        header('location: authenticate.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- ubunto font family google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>   

    <div class="wrapper">
        
        <form action="authenticate.php" method="POST">
            <h4 id="message">Learning Management</h4>
            <input type="text" name="username" id="username" placeholder="username" autocomplete="off">
            <input type="password" name="password" id="password" placeholder="password">
            <input type="submit" name="login" id="login" value="LOGIN">
          
                <!-- display error message when logging in-->
            <?php 
                    if(isset($_SESSION['error'])){
                        echo("<div class='error_message'> <p>{$_SESSION['error']} </p></div> "); 
                    }
                    unset($_SESSION['error']);
            ?>

        </form>

    </div>    
</body>
</html>