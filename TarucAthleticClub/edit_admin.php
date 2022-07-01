<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_GET['id'])) {
    $user_id = trim($_GET['id']);

    $dbConnection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $selectCommand = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($dbConnection, $selectCommand);

    if ($result) {
        $rows = mysqli_fetch_array($result);

        $user_name = $rows['user_name'];
        $password = $rows['password'];
        $email = $rows['email'];
    }
} else {
    echo "Please try again ! ";
}

if (isset($_POST['btnSubmit'])) {

    $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    $errorMsgUserId = validateUserId($user_id);
    $errorMsgDate = validateDate($date);

    $updateStatement = "UPDATE users SET user_name='$user_name' , email='$email', password='$password' WHERE user_id='$user_id'";

    $result = mysqli_query($con, $updateStatement);

    if ($result) {
        header("Location: admin.php"); //direct to login page
        die;
    }
}

$user_data = check_login($con);
?>

<head>
    <meta charset="UTF-8">
    <title><?php echo $title = "TARUC Athletic Club - Admin"; ?></title>
    <link rel="stylesheet" type="text/css" href="css/edit_admin.css" />
    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
    <!-- Box icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/nav.js" type="text/javascript"></script>
</head>

<?php include 'admin_nav.php'; ?>

<div class="box">
    <div class="box-content">
        <form method="POST" action="">
            <table>
                <tr>
                    <td>Student ID : </td>
                    <td><?php echo($user_id); ?></td>
                </tr>
                <tr>
                    <td>User Name : </td>
                    <td><?php printHTMLInputII("user_name", $user_name, "text", "30", "true"); ?></td>
                </tr>
                <tr>
                    <td>Taruc E-mail : </td>
                    <td><?php printHTMLInputII("email", $email, "text", "30", "true"); ?></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><?php printHTMLInputII("password", $password, "text", "30", "true"); ?></td>
                </tr>
            </table><br/>
            <input type="submit" name="btnSubmit" value="Update"/>
            <input type="button" name="btnCancel" value="Cancel" onclick="location = 'admin.php'"/>
        </form>
    </div>
</div>
