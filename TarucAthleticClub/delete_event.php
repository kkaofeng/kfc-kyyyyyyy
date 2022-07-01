<?php
require_once'connection.php';

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

if (isset($_POST['btnDelete'])) {

    $deleteStatement = "DELETE from event WHERE event_id='$event_id'";

    $result = mysqli_query($con, $deleteStatement);

    if ($result) {
        header("Location: event_manage.php"); //direct to login pag
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
                        <td>Event ID:</td>
                        <td><?php echo($event_id); ?></td>
                    </tr>
                    <tr>
                        <td>Event:</td>
                        <td><?php echo($event_name); ?></td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><?php echo($event_date); ?></td>
                    </tr>
                    <tr>
                        <td>Details:</td>
                        <td><?php echo($event_detail); ?></td>
                    </tr>

                </table>
                <br/>
                <input type="submit" name="btnDelete" value="Delete "/>
                <input type="button" name="btnCancel" value="Cancel" onclick="location = 'event_manage.php'"/>

            </form>
        </div>
    </div>


</body>
</html>
