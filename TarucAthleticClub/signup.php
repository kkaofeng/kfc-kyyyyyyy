<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //when something posted
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];

    $errorMsgUserId = validateUserId($user_id);
    $errorMsgEmail = validateEmail($email);
    
    $finalErrorMsg = array_merge($errorMsgUserId, $errorMsgEmail);

    if (count($finalErrorMsg) == 0) {
        if (!empty($user_name) && !empty($password) && !empty($user_id) && !is_numeric($user_name) && !empty($cpassword)) {
            if ($password == $cpassword) {

                //save to database
                $query = "insert into users (user_id, user_name, password, usertype, email) values ('$user_id', '$user_name', '$password', '$usertype', '$email')";

                mysqli_query($con, $query);
                
                header("Location: login.php"); //direct to login page
                die;
            } else {
                echo "Your passwords don't match !!!";
            }
        } else {
            echo "Invalid Information !!!";
        }
    } else {
        echo "<div>";
        echo "<ul>";
        foreach ($finalErrorMsg as $message) {
            echo"<li style='color:red;'>$message</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="css/login_signup.css" />
    </head>
    <body>

        <div id="box" style="font-family: lucida grande;">
            <form method="post">
                <div style="font-size: 50px;margin: 10px;">Sign Up</div>
                Already a member? <a href="login.php">Login</a><br><br>

                <input id="text" type="text" name="user_name" placeholder="Enter Username" required=""><br><br>
                <input id="text" type="text" name="email" placeholder="E-mail" required=""><br><br>
                <input id="text" type="text" name="user_id" placeholder="Student ID" required=""><br><br>
                <input id="text" type="password" name="password" placeholder="Enter Password" required=""><br><br>
                <input id="text" type="password" name="cpassword" placeholder="Confirm Password" required=""><br><br>
                <input type="none" name="usertype" value="user" style="opacity: 0; cursor: context-menu">
                <input id="button" type="submit" value="Sign Up"><br><br>
            </form>
        </div>
    </body>
</html>
