<?php
session_start();

include("connection.php");
include("function.php");
$user_data = check_login($con);

if (isset($_GET['id'])) {
    $event_id = trim($_GET['id']);

    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $selectCommand = "SELECT * FROM event WHERE event_id = '$event_id'";
    $result = mysqli_query($con, $selectCommand);

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

    $user_name = $user_data['user_name'];
    $user_id = $user_data['user_id'];
    $email = $user_data['email'];
} else {
    echo "Please try again ! ";
}

$joinedSelect = "SELECT * FROM joined";
$joinedResult = mysqli_query($con, $joinedSelect);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - Join Event"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/join_event.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>


    <div id="main">
        <?php
        if (isset($_POST['btnSubmit'])) {
            while ($joinedRow = mysqli_fetch_array($joinedResult)) {
                if ($user_data['user_name'] == $joinedRow['userj_name'] && $user_data['user_id'] == $joinedRow['userj_id'] && $event_name == $joinedRow['eventj_name']) {
                    echo "You had joined this event ...<br>";
                } else {
                    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                    $contact_no = $_POST['contact_no'];
                    $current_seat++;

                    $query = "insert into joined (eventj_id, eventj_name, eventj_date, userj_id, userj_name, userj_email, contact_no) values ('$event_id', '$event_name', '$event_date','$user_id', '$user_name', '$email', '$contact_no')";
                    $joinedResult = mysqli_query($con, $query);
                    $updateStatement = "UPDATE event SET current_seat='$current_seat' WHERE event_id='$event_id'";
                    $updateResult = mysqli_query($con, $updateStatement);

                    header("Location: complete.php?id=" . $event_id . ""); //direct to login page
                    die;
                }
            }
        }
        echo "<img src='./upload/" . $event_image . " 'style='max-width: 300px;max-height: 250px;border-radius: 5px;border: 2px solid white;box-shadow: 3px 3px 2px #1acc99;'>";
        ?>
        <div id="content">
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Event ID : <?php echo $event_id; ?></td>
                    </tr>
                    <tr>
                        <td>Event Name : <?php echo $event_name; ?></td>
                    </tr>
                    <tr>
                        <td>Event Start : <?php echo $event_date; ?></td>
                    </tr>
                    <tr>
                        <td>Event Detail : <?php echo $event_detail; ?></td>
                    </tr>
                </table>
                <div id='line' style='position: relative; margin: 10px auto;width: 100%; background: #1acc99;height: 2px;box-shadow: 3px 3px 2px black;'></div>
                Name : <?php echo $user_name; ?><br>
                Student ID : <?php echo $user_id; ?><br>
                Email : <?php echo $email; ?><br>

                Contact No. : +60
                <?php
                $selectJoined = "SELECT * FROM joined";
                $joinResult = mysqli_query($con, $selectJoined);

                if ($joinResult) {
                    while ($joinRow = mysqli_fetch_array($joinResult)) {
                        if ($joinRow['userj_id'] == $user_id) {
                            if ($joinRow['userj_name'] == $user_name) {
                                if ($joinRow['contact_no'] != "") {
                                    echo $joinRow['contact_no'];
                                    echo "<input type='none' name='contact_no' value='" . $joinRow['contact_no'] . "' style='opacity: 0; cursor: context-menu'><br>";
                                    echo"<div id='join'><input id='button' type='submit' name='btnSubmit' value='Join'/>
                                        <a href='event.php'><input id='button' type='button' name='btnCancel' value='Cancel'/></a></div>";
                                    die;
                                }
                            }
                        }
                    }
                    echo "<input id='text' type='text' name='contact_no' placeholder='Only numbers ..' required=''><br><br>";
                    echo"<div id='join'><input id='button' type='submit' name='btnSubmit' value='Join'/>
                         <a href='event.php'><input id='button' type='button' name='btnCancel' value='Cancel'/></a></div>";
                    die;
                }

                echo $rows['current_seat'] . " / " . $rows['event_seat'];
                ?>


            </form>
        </div>
    </div>
</html>