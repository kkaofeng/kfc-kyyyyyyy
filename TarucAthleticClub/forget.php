<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_POST['btnSubmit'])) {
    //when something posted
    $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
    $user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    if (!empty($password) && !empty($_POST['cpassword'])) {
        if ($password == $_POST['cpassword']) {
            //read from database
            $query = "select * from users where user_id = '$user_id'";
            $result = mysqli_query($con, $query);
            $user_data = mysqli_fetch_array($result);
            
            if ($result) {
                if ($user_data['user_name'] == $user_name) {
                    if ($user_data['email'] == $email) {
                        if ($user_data['user_id'] == $user_id) {
                            if ($result) {
                                $updateStatement = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
                                $result = mysqli_query($con, $updateStatement);

                                if ($result) {
                                    echo "<script>alert ('Your Password has been successfully updated!')</script>";
                                    header("Location:login.php");
                                    die;
                                } else {
                                    echo "Error inserting information: " . mysqli_error($con);
                                }
                            }
                        } else {
                            echo "<script>alert ('Invalid User ID !')</script>";
                        }
                    } else {
                        echo "<script>alert ('Invalid Email !')</script>";
                    }
                } else {
                    echo "<script>alert ('Invalid User Name !')</script>";
                }
            } else {
                echo "<script>alert ('Invalid Information !')</script>";
            }
        } else {
            echo "<script>alert ('Invalid Information !')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/login_signup.css" />
        <script src="js/login.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="box" style="font-family: lucida grande;">
            <form method="post">
                <div style="font-size: 50px;margin: 10px;">Login</div>
                New to the site? <a href="signup.php">Sign Up</a><br><br>
                <input id="text" type="text" name="user_name" placeholder="Enter Username" required=""><br><br>
                <input id="text" type="password" name="password" placeholder="Enter Password" required=""><br><br>
                <a class="pop" style="font-size: 15px;">Forget password ?</a><br><br>
                <input id="button" type="submit" value="Login"><br><br>
            </form>
        </div>

        <div class="fgt">
            <div class="fgt-content">
                <a href="login.php" class="close" style="text-decoration: none;">+</a>
                <form method="post">
                    <div style="font-size: 30px;margin-top: 30px;">Forget Password</div><br>
                    <input id="fgt_text" type="text" name="user_name" placeholder="Enter Username" required=""><br><br>
                    <input id="fgt_text" type="text" name="email" placeholder="Enter E-mail" required=""><br><br>
                    <input id="fgt_text" type="text" name="user_id" placeholder="Enter Student ID" required=""><br><br>
                    <input id="fgt_text" type="password" name="password" placeholder="Enter New Password" required=""><br><br>
                    <input id="fgt_text" type="password" name="cpassword" placeholder="Confirm Password" required=""><br><br>
                    <input id="button" type="submit" name="btnSubmit" value="Submit"><br><br>
                </form>
            </div>
        </div>
    </body>
</html>