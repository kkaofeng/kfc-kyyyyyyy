<?php
session_start();

include("connection.php");
include("function.php");

$selectEvent = "select * from event ";
$eventResult = mysqli_query($con, $selectEvent);
$selectJoined = "select * from joined ";
$joinedResult = mysqli_query($con, $selectJoined);

if (isset($_POST['btnSubmit'])) {
    if (isset($_FILES['event_image'])) {
        $file = $_FILES['event_image'];
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

    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_detail = $_POST['event_detail'];
    $event_seat = $_POST['event_seat'];

    $errorMsgId = validateId($event_id);
    $errorMsgEvent = validateEvent($event_name);
    $errorMsgDate = validateDate($event_date);
    $errorMsgDetail = validateDetail($event_detail);

    $finalErrorMsg = array_merge(array_merge(array_merge(array_merge($errorMsgId, $errMsg), $errorMsgEvent), $errorMsgDate), $errorMsgDetail);
    if (count($finalErrorMsg) == 0) {
        $newFileName = date('Ymd') . '-' . uniqid() . '.' . $extension;
        // Move file from temporary storage to project folder
        move_uploaded_file($file['tmp_name'], './upload/' . $newFileName);

        $insertStatement = "insert into event (event_id, event_image, event_name, event_date, event_seat, event_detail) values ('$event_id', '$newFileName', '$event_name','$event_date', '$event_seat', '$event_detail')";
        $results = mysqli_query($con, $insertStatement);

        if ($results) {
            header("Location: event_manage.php"); //direct to login pag
            die;
        } else {
            echo "<div>";
            echo "Error inserting event into database." . mysqli_error($con);
            echo "</div>";
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
        <title><?php echo $title = "TARUC Athletic Club - Event Manage"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/event_manage.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <!-- Box icons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/event_manage.js" type="text/javascript"></script>
    </head>


    <?php include 'admin_nav.php'; ?>

    <div class="home_content">
        <div class="text"><i class='bx bx-calendar-event' ></i>Event Manage</div>
    </div>
    <div id="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="col-1">Event ID</th>
                    <th class="col-1">Image</th>
                    <th class="col-2">Event Name</th>
                    <th class="col-2">Event Start</th>
                    <th class="col-1">Available Seat</th>
                    <th class="col-3">Details</th>
                    <th class="col-1">Edit</th>
                    <th class="col-1">Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($eventResult) {
                    while ($row = mysqli_fetch_array($eventResult)) {

                        $newFileName = $row['event_image'];
                        echo "<tr>
                        <td>" . $row['event_id'] . "</td>
                        <td><img src='./upload/" . $newFileName . "' alt='' style='width:100px; height:100px;'/></td>
                        <td>" . $row['event_name'] . "</td>
                        <td>" . $row['event_date'] . "</td>
                        <td>" . $row['current_seat'] . " / " . $row['event_seat'] . "</td>
                        <td>" . $row['event_detail'] . "</td>
                        <td><a href='edit_event.php?id=" . $row['event_id'] . "'><i class='bx bxs-edit' ></i></a></td>
                        <td><a href='delete_event.php?id=" . $row['event_id'] . "'><i class='bx bxs-trash' ></i></a></td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="add">
        <a class="pop" style="text-decoration: none;border: 10px solid #lacc99;">Add Event</a>
    </div>

    <div class="box">
        <div class="box-content">
            <div class="close">+</div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div style="font-size: 45px;margin-top: 25px;margin-bottom: -30px;font-weight: bold;">Add Event</div><br>
                <div id="content">
                    <input id="text" type="text" name="event_id" placeholder="Event ID" required=""><br><br>
                    <input id="text" type="text" name="event_name" placeholder="Event Name" required=""><br><br>
                    <input id="text" type="text" name="event_date" placeholder="Event Start" required=""><br><br>
                    <input id="text" type="text" name="event_seat" placeholder="Max Limit of Participation" required=""><br><br>
                    <input id="text" type="text" name="event_detail" placeholder="Details" required=""><br><br>
                    <input type="file" name="event_image" value="" required="true" />
                </div>
                <input id="button" type="submit" name="btnSubmit" value="Add" />
                <input id="button" type="button" name="btnCancel" value=Cancel onclick="location = 'event_manage.php'" />
            </form>
        </div>
    </div>
</body>
</html>
