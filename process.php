<?php
include 'db.php';

if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    
    date_default_timezone_set('Etc/GMT-3');
    $time = date('H:i:s a',time());
    
    if(!isset($user) || $user == '' || !isset($message) || $message == ''){
        $error_message = "Please fill in your name and a message!";
        header("Location: index.php?error_message=".urlencode($error_message));
        exit();
    } else {
        $query = "INSERT INTO shouts (user, message, time)";
        $query .= "VALUES ('$user', '$message', '$time')";
        
        if(!mysqli_query($connection, $query)) {
            die('Error' . mysqli_error($connection));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}

?>