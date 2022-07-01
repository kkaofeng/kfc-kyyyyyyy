<?php
include("connection.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/admin_nav.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <!-- Box icons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="sidebar">
            <img src="css/picture/giphy.gif" class="running">
            <div class="logo_content">
                <div class="logo">
                    <div class="logo_name">TARUC Athletic Club</div>
                </div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="dashboard.php">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span> 
                </li>
                <li>
                    <a href="admin.php">
                        <i class='bx bxs-user-circle' ></i>
                        <span class="links_name">Admin</span>
                    </a>
                    <span class="tooltip">Admin</span> 
                </li>
                <li>
                    <a href="event_manage.php">
                        <i class='bx bx-calendar-event' ></i>
                        <span class="links_name">Event Manage</span>
                    </a>
                    <span class="tooltip">Event Manage</span> 
                </li>
                <li>
                    <a href="manage_booking.php">
                        <i class='bx bxs-book-content'></i>
                        <span class="links_name">Manage Booking</span>
                    </a>
                    <span class="tooltip">Manage Booking</span> 
                </li>
            </ul>

            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <div class="name_job">
                            <div class="name"><?php echo $user_data['user_name']; ?></div>
                        </div>
                    </div>
                    <a href="logout.php" ><i class='bx bx-log-out' id="log_out"></i></a>
                </div>
            </div>
        </div>