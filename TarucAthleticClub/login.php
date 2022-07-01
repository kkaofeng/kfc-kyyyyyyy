<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //when something posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result); //if data exist , return
                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];

                    if ($user_data["usertype"] == "user") {
                        header("Location: index.php"); //direct to index page
                        die;
                    }

                    if ($user_data["usertype"] == "admin") {
                        header("Location: dashboard.php"); //direct to index page
                        die;
                    }
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Incorrect user_name or password")';  //not showing an alert box.
                echo '</script>';
            }
        }
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect user_name or password")';  //not showing an alert box.
        echo '</script>';
    } else {
        echo "Invalid Information !!!";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/login_signup.css" />
    </head>
    <body>

        <div id="box" style="font-family: lucida grande;">
            <form method="post">
                <div style="font-size: 50px;margin: 10px;">Login</div>
                New to the site? <a href="signup.php">Sign Up</a><br><br>

                <input id="text" type="text" name="user_name" placeholder="Enter Username" required=""><br><br>
                <input id="text" type="password" name="password" placeholder="Enter Password" required=""><br><br>
                <a href="forget.php" class="pop" style="font-size: 15px;">Forget password ?</a><br><br>
                <input id="button" type="submit" value="Login"><br><br>
            </form>
        </div>
    </body>
</html>
