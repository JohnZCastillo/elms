<?php

/* 
    check if the user is registered
        
        if true then return student.php or teacher.php base on the 
        user role

        if flase then return the index.html

*/

//include database identity to this file
include 'connectionDb.php';

//store current user input 
$tempUser = $_POST['username'];
$tempPass = $_POST['password'];

//make a connection : there is a limit of 1 incase of duplicate 
$stmt = $conn->prepare("SELECT * from users where username = ? limit 1");

//bind and execute
$stmt->bind_param("s",$tempUser);
$stmt->execute();

//bind result to this variables 
$stmt->bind_result($username, $password,$role);
$stmt -> fetch();

//close connection
$stmt -> close(); 
$conn -> close();

//user input is compare to the result from the database  
if($username == $tempUser && $password == $tempPass){
    
    if($role == 'teacher'){
        header('teacher.php');
        die();
    }


    if($role == 'student'){
        header('student.php');
        die();
    }
}
//reach this line if user input does not match data from database
echo('not registered');


?>