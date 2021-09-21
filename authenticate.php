<?php

/* 
    check if the user is registered
        
        if true then return student.php or teacher.php base on the 
        user role

        if flase then return the index.html

*/

session_start();
//first check if already login 
if(isset($_SESSION['id']) and isset($_SESSION['role'])){
    //login
    if($_SESSION['role'] === 'student'){
        header('location: student.php');
        die();
    }
}

//include database identity to this file
include 'connectionDb.php';

//store current user input 
$tempUser = $_POST['username'];
$tempPass = $_POST['password'];

//make a connection : there is a limit of 1 incase of duplicate 
$stmt = $conn->prepare("SELECT * from users where id = ? limit 1");

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
    //if found set id and role for retriving data in specified page
    $_SESSION['id'] = $tempUser;
    $_SESSION['role'] = $role;

    if($role === 'teacher'){
        header('location: teacher.php');
        die();
    }


    if($role === 'student'){
        header('location: student.php');
        die();
    }
}
//reach this line if user input does not match data from database
$_SESSION['error'] = "incorect username or password";
header('location: index.php');

?>