<?php
session_start();

include("connection.php");
include("function.php");

$query = "select * from joined";
$result = mysqli_query($con, $query);

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - Manage Booking"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/manage_booking.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <!-- Box icons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/nav.js"></script>
    </head>

    <?php include 'admin_nav.php'; ?>

    <div class="home_content">
        <div class="text"><i class='bx bxs-book-content'></i>Manage Booking</div>
    </div>

    <div id="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-2">Student ID</th>
                    <th class="col-2">Student Name</th>
                    <th class="col-2">Taruc E-mail</th>
                    <th class="col-2">Current Event</th>
                    <th class="col-2">Event Start Time</th>
                    <th class="col-1">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;

                while ($rows = mysqli_fetch_assoc($result)) {

                    echo "
                    <tr>
                        <td>" . $x . "</td>
                        <td>" . $rows['userj_id'] . "</td>
                        <td>" . $rows['userj_name'] . "</td>
                        <td>" . $rows['userj_email'] . "</td>
                        <td>" . $rows['eventj_name'] . "</td>
                        <td>" . $rows['eventj_date'] . "</td>
                        <td><a href='delete_booking.php?id=" . $rows['eventj_name'] . "&id2=" . $rows['userj_id'] . "'><i class='bx bxs-trash' ></i></a></td>

                    </tr>";
                    $x++;
                }
                ?>
            </tbody>

        </table>
    </div>
</body>
</html>
