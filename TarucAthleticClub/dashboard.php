<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($con);

$users = "select * from users";
$resultUsers = mysqli_query($con, $users);

$x = 0;
while ($row = mysqli_fetch_array($resultUsers)) {
    if ($row['usertype'] === 'admin') {
        $x++;
    }
}

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$event = "select * from event";
$resultEvent = mysqli_query($con, $event);
$json = [];
$json2 = [];
$y = 0;
while ($rows = mysqli_fetch_array($resultEvent)) {
    $json[] = $rows['event_name'];
    $json2[] = $rows['current_seat'];
    $y++;
}

$joinedEvent = "select * from joined";
$resultjEvent = mysqli_query($con, $joinedEvent);
$z = 0;
while ($joinedRow = mysqli_fetch_array($resultjEvent)) {
    $z++;
}

$newFileName = $user_data['image'];
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - DashBoard"; ?></title>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" type="text/javascript"></script>
        <script src="js/dashboard.js"></script>
    </head>

    <?php include 'admin_nav.php'; ?>

    <div class="home_content">
        <div class="text"><i class='bx bxs-dashboard'></i>Dashboard</div>


        <div class="row">
            <div class="col-1"></div>

            <div class="col-2 p-3 mt-5" style="font-size: 25px; border: 2px solid #1acc99; border-radius: 10px;">
                <i class='bx bxs-user-circle'  style="font-size: 35px; margin-right: 15px;"></i>
                <a style="margin-right: 60px;font-size: 18px;">Admin</a><?php echo $x; ?>
            </div>
            <div class="col-1"></div>
            <div class="col-2 p-3 mt-5" style="font-size: 25px; border: 2px solid #1acc99; border-radius: 10px;">
                <i class='bx bx-calendar-event' style="font-size: 35px; margin-right: 15px;"></i>
                <a style="margin-right: 50px;font-size: 18px;">Current Event</a><?php echo $y; ?>
            </div>
            <div class="col-1"></div>
            <div class="col-2 p-3 mt-5" style="font-size: 25px; border: 2px solid #1acc99; border-radius: 10px;">
                <i class='bx bxs-book-content' style="font-size: 35px; margin-right: 10px;"></i>
                <a style="margin-right: 50px;font-size: 18px;">Student Booked</a><?php echo $z; ?>
            </div>
        </div><br><br><br>
        <img src="css/picture/d_think.png" style="position: absolute;width: 300px;right: 100px;top: 70px;z-index: -1;">

        <div class="row">
            <div class="col-8">
                <canvas id="myChart" style="width:100%;max-width:1000px;margin: 10px auto;border: 3px solid #1acc99;padding: 50px;border-radius: 20px;"></canvas>
            </div>
            <script>
                var barColors = [
                    "#FF4118",
                    "#FFC018",
                    "#EEFF18",
                    "#81FF18",
                    "#18FF96",
                    "#18FFE7",
                    "#18C7FF",
                    "#1877FF",
                    "#2618FF",
                    "#A718FF",
                    "#E618FF",
                    "#FF187E"
                ];
                var ctx = document.getElementById("myChart").getContext('2d');
                new Chart("myChart", {
                    type: "doughnut",
                    data: {
                        labels:<?php echo json_encode($json); ?>,
                        datasets: [{
                                backgroundColor: barColors,
                                data: <?php echo json_encode($json2); ?>
                            }]
                    },
                    options: {
                        title: {
                            display: true,
                            fontSize: 30,
                            text: "Total Amount of Students that Joined Events"
                        }
                    }
                });
            </script>

            <div class="col-2 p-4" style="border: 2px solid #1acc99;border-radius: 50px;">
                <div class="row">
                    <div class="card col-12" style="width: 17rem;border: none;background: none;font-weight: bold">
                        <?php echo "<img src='./upload/" . $newFileName . "' alt='' style='max-width: 17rem;border-radius: 50px;'" ?>
                        <div class="card-body" style="font-weight: bold;">
                            <p class="card-text">Admin Name : <?php echo $user_data['user_name'] ?></p>
                            <p class="card-text">Student ID : <?php echo $user_data['user_id'] ?></p>
                            <p class="card-text">Taruc E-mail : <?php echo $user_data['email'] ?></p>
                            <p class="card-text">Date of joined : <?php echo $user_data['date'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </body>
</html>
