<?php
session_start();

include("connection.php");
include("function.php");

$selectJoined = "SELECT * FROM joined";
$joinResult = mysqli_query($con, $selectJoined);

$user_data = check_login($con);

if (isset($_GET['id'])) {
    $event_id = trim($_GET['id']);

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $selectCommand = "SELECT * FROM event WHERE event_id = '$event_id'";
    $result = mysqli_query($conn, $selectCommand);

    if ($result) {
        $rows = mysqli_fetch_array($result);

        $event_id = $rows['event_id'];
        $event_name = $rows['event_name'];
        $event_date = $rows['event_date'];
        $event_detail = $rows['event_detail'];
        $event_image = $rows['event_image'];
        $event_seat = $rows['event_seat'];
        $current_seat = $rows['current_seat'];
    }
} else {
    echo "Please try again ! ";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - Complete"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/complete.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <script src="all.js"></script>
    </head>
    <body>
        <div id="main">
            <div id="title">
                Complete Booking !<br>
            </div>
            Name : <?php echo $user_data['user_name']; ?><br>
            Student ID : <?php echo $user_data['user_id']; ?><br>
            Event Name : <?php echo $event_name; ?><br>
            See you on <?php echo $event_date; ?> !!!<br>
            <a href="event.php">
                <div class="back">Back to Event</div>
            </a>
        </div>
    </body>
</html>