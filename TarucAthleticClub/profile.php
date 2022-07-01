<?php
session_start();

include("connection.php");
include("function.php");

$selectJoined = "SELECT * FROM joined";
$joinResult = mysqli_query($con, $selectJoined);

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - Profile"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/profile.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <script src="all.js"></script>
    </head>
    <body>
        <div id="icons">
            <!-- visit => "font-awesome.com" for icons -->
            <a href="https://www.facebook.com/Tarucathletic"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/tarucathleticclub/?igshid=1tt8ntbyi6xzg"><i class="fab fa-instagram"></i></a>
        </div>
        <div id="main">
            Name : <?php echo $user_data['user_name'] ?><br>
            Student ID : <?php echo $user_data['user_id'] ?><br>
            Email : <?php echo $user_data['email'] ?><br>
            Current Event(s) Joined : <br><?php
            while ($joinRow = mysqli_fetch_array($joinResult)) {
                if ($joinRow['userj_id'] == $user_data['user_id']) {
                    if ($joinRow['userj_name'] == $user_data['user_name']) {
                        if ($joinRow['userj_email'] == $user_data['email']) {
                            echo "- " . $joinRow['eventj_name'] . " start on " . $joinRow['eventj_date'] ."<br>";
                        }
                    }
                }
            }echo"<a href='index.php'><div class='back'>Back</div></a>";
            die;
            ?><br>

            <a href="index.php">
                <div class="back">Back</div>
            </a>
        </div>


    </body>
</html>
