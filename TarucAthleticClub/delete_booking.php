<?php
require_once'connection.php';

if (isset($_GET['id'])) {
    if (isset($_GET['id2'])) {

        $eventj_name = trim($_GET['id']);
        $userj_id = trim($_GET['id2']);

        $selectCommand = "SELECT * FROM joined WHERE eventj_name = '$eventj_name' AND userj_id = '$userj_id'";
        $result = mysqli_query($con, $selectCommand);

        if ($result) {
            $row = mysqli_fetch_array($result);

            $userj_name = $row['userj_name'];
            $userj_email = $row['userj_email'];
            $eventj_name = $row['eventj_name'];
            $eventj_date = $row['eventj_date'];
        }
    }
}

if (isset($_POST['btnDelete'])) {

    $deleteStatement = "DELETE from joined WHERE eventj_name='$eventj_name' AND userj_id = '$userj_id'";
    $result = mysqli_query($con, $deleteStatement);

    if ($result) {
        header("Location: manage_booking.php"); //direct to login pag
        die;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/delete_event.css" />
        <title></title>
    </head>

    <?php include 'admin_nav.php'; ?>

    <div class="box">
        <div class="box-content">        
            <h1>Delete Event</h1>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Event ID :</td>
                        <td><?php echo($userj_id); ?></td>
                    </tr>
                    <tr>
                        <td>Event :</td>
                        <td><?php echo($userj_name); ?></td>
                    </tr>
                    <tr>
                        <td>Date :</td>
                        <td><?php echo($userj_email); ?></td>
                    </tr>
                    <tr>
                        <td>Details :</td>
                        <td><?php echo($eventj_name); ?></td>
                    </tr>
                    <tr>
                        <td>Date :</td>
                        <td><?php echo($eventj_date); ?></td>
                    </tr>
                </table>
                <br/>
                <input type="submit" name="btnDelete" value="Delete "/>
                <input type="button" name="btnCancel" value="Cancel" onclick="location = 'manage_booking.php'"/>
            </form>
        </div>
    </div>


</body>
</html>

