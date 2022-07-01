<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <script src="js/all.js"></script>
    </head>
    <body>
        <div id="container">
            <nav id="navbar">
                <ul>
                    <li><a href="#scroll-home">Home</a></li>
                    <li><a href="#scroll-event">Event</a></li>
                    <li><a href="#scroll-about">Profile</a></li>
                    <li><a href="#scroll-sponsor">Sponsors</a></li>
                </ul>
                <a href="logout.php" style="position: absolute;color: white;text-decoration: none; right: 20px; top: 20px;">Logout</a>
            </nav>

            <div id="icons">
                <!-- visit => "font-awesome.com" for icons -->
                <a href="https://www.facebook.com/Tarucathletic"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/tarucathleticclub/?igshid=1tt8ntbyi6xzg"><i class="fab fa-instagram"></i></a>
            </div>

            <section id="scroll-home">
                <div id="wrap1">
                    <h1 style='word-spacing: 10px;letter-spacing: 3px;'>Welcome to TARUC Athletic Club</h1>
                    <h2 style='word-spacing: 20px;'>Hi , <?php echo $user_data['user_name']; ?></h2>
                </div>
            </section>

            <section id="scroll-event">
                <div id="wrap2">
                    <h1>Event</h1>
                    <a style="font-size: 25px; font-weight: bold;    text-shadow: 2px 2px 1px #1acc99;">What is track and field ?</a><br>
                    <h2>Track and field is a sport that includes athletic contests established on the skills of running , jumping , 
                        and throwing . The name is derived from where the sport takes place , a running track and a grass field for
                        the throwing and some of the jumping events. Track events includes short-distance , long-distance events 
                        such as 100m , 200m , 4 x 400 and even 1500m . Field events on the other hand comprises long jump , high jump , 
                        shot put and even javelin throw . </h2>
                    <a href="event.php" id="browse_event" style="text-decoration: none;">More Event <i class="fas fa-angle-double-right"></i></a>
                </div>
            </section>

            <section id="scroll-about">
                <div id="wrap3">
                    <h1>Profile</h1>
                    <h2>Athletics is an exclusive collection of sporting events that involve competitive running ,
                        jumping, throwing, and walking . The most common types of athletics competitions are track and 
                        Field , road running , cross country running , and race walking . The simplicity of the competitions 
                        and the lack of a need for expensive equipment , makes athletics one of the most commonly competed 
                        sports in the world .</h2><br>
                    <a href="profile.php" id="info" style="text-decoration: none;">View your personal information ...</a>
                </div>
            </section>

            <section id="scroll-sponsor">
                <h1>Sponsored By : </h1>
                <p><img id="img1" src="css/picture/Logo_J&T.jpg"/>
                    <img id="img2" src="css/picture/tealive.jpeg"/>
                    <img id="img2" src="css/picture/fujidessert.png" style="width: 200px;"/>
                    <img id="img2"src="css/picture/yoyo.jpg"></p>
            </section>
        </div>
    </body>

</html>