<?php
session_start();

include("connection.php");
include("function.php");

$query = "select * from users";
$result = mysqli_query($con, $query);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $errMsg = array();
        if ($file['error'] > 0) {
            switch ($file['error']) {
                case UPLOAD_ERR_NO_FILE:
                    $errMsg[] = "No file selected. Please select a file.";
                    break;
                // add more case if you want
                default:
                    $errMsg[] = "There is an error uploading the file. Please try again.";
                    break;
            }
        }
        if ($file['size'] > 1048576) {
            $errMsg[] = "File uploaded is too big, maximum 1MB only.";
        }
        // validate the file extension
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $validExtensions = array("png", "gif", "jpg", "jpeg");
        if (in_array($extension, $validExtensions) == false) {
            $errMsg[] = "Invalid file format. Upload only jpg, png, or gif.";
        }
    }

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
                $newFileName = date('Ymd') . '-' . uniqid() . '.' . $extension;
                // Move file from temporary storage to project folder
                move_uploaded_file($file['tmp_name'], './upload/' . $newFileName);
                //save to database
                $query = "insert into users (user_id, image,user_name, password, usertype, email) values ('$user_id', '$newFileName', '$user_name', '$password', '$usertype', '$email')";
                mysqli_query($con, $query);

                header("Location: admin.php"); //direct to login page
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
            echo"<li style='margin-left: 100px;color:red;'>$message</li>";
        }
    }
}

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - Admin"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <!-- Box icons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/admin.js" type="text/javascript"></script>
    </head>

<?php include 'admin_nav.php'; ?>


    <div class="home_content">
        <div class="text"><i class='bx bxs-user-circle' ></i>Admin</div>
        <a class="pop" style="position: absolute;text-decoration: none; color: black; right: 20px; top: 20px;">Sign Up</a>
    </div>
    <img src="css/picture/d_data.png" style="position: absolute;width: 200px;opacity: 0.7;left: 70px;top: 0;">

    <div id="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-1">Student ID</th>
                    <th class="col-1">Admin Pic</th>
                    <th class="col-2">Admin Name</th>
                    <th class="col-2">Taruc E-mail</th>
                    <th class="col-2">Date</th>
                    <th class="col-1">Edit</th>
                    <th class="col-1">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;

                while ($rows = mysqli_fetch_assoc($result)) {
                    $newFileName = $rows['image'];
                    if ($rows['usertype'] === 'admin' && $rows['user_name'] === $user_data['user_name']) {
                        echo "
                    <tr>
                        <td>" . $x . "</td>
                        <td>" . $rows['user_id'] . "</td>
                        <td><img src='./upload/" . $newFileName . "' alt='' style='width:100px; height:100px;'/></td>
                        <td>" . $rows['user_name'] . "</td>
                        <td>" . $rows['email'] . "</td>
                        <td>" . $rows['date'] . "</td>
                        <td><a href='edit_admin.php?id=" . $rows['user_id'] . "'><i class='bx bxs-edit'></i></a></td>
                        <td><a href='delete_admin.php?id=" . $rows['user_id'] . "'><i class='bx bxs-trash' ></i></a></td>
                    </tr>";
                        $x++;
                    } else if ($rows['usertype'] === 'admin') {
                        echo "
                    <tr>
                        <td>" . $x . "</td>
                        <td>" . $rows['user_id'] . "</td>
                        <td><img src='./upload/" . $newFileName . "' alt='' style='width:100px; height:100px;'/></td>
                        <td>" . $rows['user_name'] . "</td>
                        <td>" . $rows['email'] . "</td>
                        <td>" . $rows['date'] . "</td>
                        <td><i class='bx bxs-edit'></i></td>
                        <td><i class='bx bxs-trash' ></i></td>
                    </tr>";
                        $x++;
                    }
                }
                ?>
            </tbody>
        </table>        
    </div>


    <div class="box">
        <div class="box-content">
            <div class="close">+</div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div style="font-size: 50px;margin-top: 25px;font-weight: bold;">Sign Up</div><br>
                <input id="text" type="text" name="user_name" placeholder="Enter Username" required=""><br><br>
                <input id="text" type="text" name="email" placeholder="Enter E-mail" required=""><br><br>
                <input id="text" type="text" name="user_id" placeholder="Enter Student ID" required=""><br><br>
                <input id="text" type="password" name="password" placeholder="Enter Password" required=""><br><br>
                <input id="text" type="password" name="cpassword" placeholder="Confirm Password" required=""><br><br>
                <input type="file" name="image" value="" required="true" />
                <input id="button" type="submit" value="Sign Up"><br><br>
                <input type="none" name="usertype" value="admin" style="opacity: 0; cursor: context-menu">
            </form>
        </div>
    </div>
</body>
</html>
