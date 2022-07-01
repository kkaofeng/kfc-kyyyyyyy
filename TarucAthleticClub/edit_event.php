<?php
session_start();

include 'function.php';
require_once 'connection.php';

if (isset($_GET['id'])) {
    $event_id = trim($_GET['id']);

    $selectCommand = "SELECT * FROM event WHERE event_id = '$event_id'";
    $result = mysqli_query($con, $selectCommand);

    if ($result) {
        $row = mysqli_fetch_array($result);

        $event_name = $row['event_name'];
        $event_date = $row['event_date'];
        $event_detail = $row['event_detail'];
    }
}

if (isset($_POST['btnUpdate'])) {

    $event_name = isset($_POST['event_name']) ? trim($_POST['event_name']) : null;
    $event_date = isset($_POST['event_date']) ? trim($_POST['event_date']) : null;
    $event_detail = isset($_POST['event_detail']) ? trim($_POST['event_detail']) : null;

    $errorMsgEvent = validateEvent($event_name);
    $errorMsgDate = validateDate($event_date);
    $errorMsgDetail = validateDetail($event_detail);

    $updateStatement = "UPDATE event SET event_name='$event_name',event_date='$event_date',event_detail='$event_detail' WHERE event_id='$event_id'";

    $result = mysqli_query($con, $updateStatement);

    $finalErrorMsg = array_merge(array_merge($errorMsgEvent, $errorMsgDate), $errorMsgDetail);
    if (count($finalErrorMsg) == 0) {

        if ($result) {
            header("Location: event_manage.php"); //direct to login page
            die;
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
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/edit_event.css" />
        <title></title>
        <script src="js/admin.js" type="text/javascript"></script>
    </head>

    <body>
        <?php include 'admin_nav.php'; ?>
        <div class="box">
            <div class="box-content">
                <h1>Edit Event</h1>
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td>Number:</td>
                            <td><?php echo($event_id); ?></td>
                        </tr>
                        <tr>
                            <td>Event</td>
                            <td><?php printHTMLInputII("event_name", $event_name, "text", "30", "true") ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php printHTMLInputII("event_date", $event_date, "text", "30", "true") ?></td>
                        </tr>
                        <tr>
                            <td>Details</td>
                            <td><?php printHTMLInputII("event_detail", $event_detail, "text", "500", "true") ?> </td>
                        </tr>
                    </table>
                    <br/>
                    <input type="submit" name="btnUpdate" value="Update "/>
                    <input type="button" name="cancel" value="Cancel" onclick="location = 'event_manage.php'"/>
                </form>
            </div>
        </div>
    </body>
</html>
