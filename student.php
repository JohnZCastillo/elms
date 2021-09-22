<?php 
    session_start();

     //if not login then user request for this file the redirect them to authenticate
     if(!isset($_SESSION['id'])){
        header('location: authenticate.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleStudent.css">
    <title>Student</title>

</head>
<body>
    <aside class="aside-left">
        <ul class="navigation-left">
            <li>Dashboard</li>
            <li>Courses</li>
            <li>Settings</li>
        <ul>
    </aside>

    <div class="center">
            <?php
                include 'connectionDb.php';
               /*
                $stmt = $conn -> prepare('SELECT * from student_load where id = ?');
                $stmt -> bind_param('i',$_SESSION['id']);
                $stmt -> execute();
                $stmt -> bind_result($subId,$subCode,$subDescrip,$subProf);
                
                while($stmt->fetch()){
                        echo($subId);
                }
                */

            ?>
    </div>

</body>
</html>