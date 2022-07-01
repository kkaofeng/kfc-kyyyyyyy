<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($con);

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$query = "select * from event";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title = "TARUC Athletic Club - Events"; ?></title>
        <link rel="stylesheet" type="text/css" href="css/event.css" />
        <!-- font awesome icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/all.js"></script>
    </head>

    <body>        
        <div id="icons">
            <!-- visit => "font-awesome.com" for icons -->
            <a href="https://www.facebook.com/Tarucathletic"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/tarucathleticclub/?igshid=1tt8ntbyi6xzg"><i class="fab fa-instagram"></i></a>
        </div>

        <div id="main">
            <div id="js">
                <p>Event</p>
                <p><i class="fas fa-angle-double-down"></i></p>
            </div>
        </div>

        <div id="content">
            <form method="POST" action="">
                <div class="row" >
                    <div class="col-2">
                        <div class="search-box">
                            <input class="search-txt" type="text" name="search" placeholder="Type to Search ..">
                            <button class="search-btn" type="submit" name="submit_search" required="" style="text-decoration: none;"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['submit_search'])) {
                        $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                        $search = mysqli_real_escape_string($con, $_POST['search']);
                        $sql = "SELECT * FROM event WHERE event_name LIKE '%" . $search . "%' OR event_date LIKE '%" . $search . "%' OR event_detail LIKE '%" . $search . "%'";
                        $results = mysqli_query($con, $sql);
                        $queryResult = mysqli_num_rows($results);

                        if ($results) {
                            echo "<div style='color: #1acc99;font-family: 'STIX Two Text',sans-serif;'>There are " . $queryResult . " result(s)!</div>";
                            while ($row = mysqli_fetch_array($results)) {
                                $newFileName = $row['event_image'];
                                if ($row['current_seat'] == $row['event_seat']) {
                                    echo "
                            <div class='col-2'></div>
                            <div class = 'col mt-5'>
                            <div class = 'card text-center' style = 'width: 18rem;color: black;border: 10px double #1acc99; border-radius: 10px;box-shadow: 5px 5px 10px white;font-family: 'STIX Two Text',sans-serif;'>
                            <img src='./upload/" . $newFileName . "' class = 'card-img-top' style='max-height: 200px;'>
                            <div class = 'card-body'>
                            <h5 class = 'card-title fw-bold text-decoration-underline' >" . $row['event_name'] . "</h5>
                            <p class = 'card-text'>" . $row['event_detail'] . "</p>
                            <button type='button' class='btn btn-secondary btn-lg' disabled>Full</button>
                            </div>
                            </div>
                            </div>
                                ";
                                } else {
                                    echo "
                            <div class='col-2'></div>
                            <div class = 'col mt-5'>
                            <div class = 'card text-center' style = 'width: 18rem;color: black;border: 10px double #1acc99; border-radius: 10px;box-shadow: 5px 5px 10px white;font-family: 'STIX Two Text',sans-serif;'>
                            <img src='./upload/" . $newFileName . "' class = 'card-img-top' style='max-height: 200px;'>
                            <div class = 'card-body'>
                            <h5 class = 'card-title fw-bold text-decoration-underline' >" . $row['event_name'] . "</h5>
                            <p class = 'card-text'>" . $row['event_detail'] . "</p>
                            <a href = 'join_event.php?id=" . $row['event_id'] . "' class = 'btn'>Join event</a>
                            </div>
                            </div>
                            </div>
                                ";
                                }
                            }
                            echo "<div id='line' style='position: relative; margin: 30px auto;width: 1500px; background: #1acc99;height: 2px;'></div>";
                        } else {
                            echo "No match for your result!";
                        }
                    }"</div>

                    </div>"
                    ?>
                </div>
            </form>
            <?php
            echo "<div class = 'row'>";
            if ($result) {

                while ($row = mysqli_fetch_array($result)) {
                    $newFileName = $row['event_image'];
                    // var_dump($row);
                    if ($row['current_seat'] == $row['event_seat']) {
                        echo "
                            <div class='col-1'></div>
                            <div class = 'col mt-5'>
                            <div class = 'card text-center' style = 'width: 18rem;color: black;border: 10px double #1acc99; border-radius: 10px;box-shadow: 5px 5px 10px white;font-family: 'STIX Two Text',sans-serif;'>
                            <img src='./upload/" . $newFileName . "' class = 'card-img-top' style='max-height: 200px;'>
                            <div class = 'card-body'>
                            <h5 class = 'card-title fw-bold text-decoration-underline' >" . $row['event_name'] . "</h5>
                            <p class = 'card-text'>" . $row['event_detail'] . "</p>
                            <button type='button' class='btn' disabled>Full</button>
                            </div>
                            </div>
                            </div>
                                ";
                    } else {
                        echo "
                    <div class = 'col-1'></div>
                    <div class = 'col-sm-3 mt-5'>
                    <div class = 'card text-center' style = 'width: 18rem;color: black;border: 10px double #1acc99; border-radius: 10px;box-shadow: 5px 5px 10px white;font-family: 'STIX Two Text',sans-serif;'>
                    <img src='./upload/" . $newFileName . "' class = 'card-img-top' style='max-height: 200px;'>
                    <div class = 'card-body'>
                    <h5 class = 'card-title fw-bold text-decoration-underline'>" . $row['event_name'] . "</h5>
                    <p class = 'card-text'>" . $row['event_detail'] . "</p>
                    <a href = 'join_event.php?id=" . $row['event_id'] . "' class = 'btn'>Join event</a>
                    </div>
                    </div>
                    </div>";
                    }
                }
                echo "</div>";
            }
            ?>

            <a href="index.php">
                <div class="back">Back</div>
            </a>
        </div>

    </body>
</html>