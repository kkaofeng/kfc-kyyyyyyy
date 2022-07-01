<?php

function check_login($con) {

    if (isset($_SESSION['user_id'])) { //checking whether the data exist
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result); //if data exist , return
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

function random_num($length) {

    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length); //actual length
    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}

function printHTMLInput($name, $type, $maxlength, $required) {
    echo "<input name ='$name' type='$type' maxlength='$maxlength' required='$required' />";
}

function printHTMLInputII($name, $value, $type, $maxlength, $required) {
    echo "<input name ='$name' value='$value' type='$type' maxlength='$maxlength' required='$required' />";
}

function validateUserId($user_id) {
    $errorMsgUserId = array();
    if ($user_id == "" || $user_id == null) {
        $errorMsgUserId[] = "Please enter user id .";
    }
    
    $pattern = "/^\d{2}[A-Z]{3}\d{5}$/";
    if (preg_match($pattern, $user_id) == false) {
        $errorMsgUserId[] = "Please Enter A Valid Student ID.";
    }
    if (preg_match($pattern, $user_id) == true) {

        include("connection.php");

        $query = "select * from users";
        $result = mysqli_query($con, $query);
        $rows = mysqli_fetch_assoc($result);

        if ($user_id == $rows["user_id"]) {
            $errorMsgUserId[] = "$user_id already exist . Please try another event id .";
        }
    }
    return $errorMsgUserId;
}

function validateEmail($email) {
    $errorMsgEmail = array();

    if ($email == "" || $email == null) {
        $errorMsgEmail[] = "Please enter Your Email.";
    }
    // strlen() = php function to get the length of string
    if (strlen($email) > 35) {
        $errorMsgEmail[] = "Email should not be longer than 35 characters";
    }

    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

    if (preg_match($pattern, $email) == false) {
        $errorMsgEmail[] = "Invalid Email entered.";
    }

    return $errorMsgEmail;
}

function validateId($event_id) {
    $errorMsgId = array();
    include("connection.php");

    if ($event_id == "" || $event_id == null || $event_id < 0) {
        $errorMsgId[] = "Please enter event id .";
    }

    $query = "select * from event";
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_assoc($result);

    if ($event_id == $rows["event_id"]) {
        $errorMsgId[] = "$event_id already exist . Please try another event id .";
    }

    return $errorMsgId;
}

function validateEvent($event_name) {
    $errorMsgEvent = array();
    include("connection.php");

    if ($event_name == "" || $event_name == null || $event_name < 0) {
        $errorMsgEvent[] = "Please enter Event name";
    }

    $query = "select * from event";
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_assoc($result);

    if ($event_name == $rows["event_name"]) {
        $errorMsgEvent[] = "$event_name already exist . Please try another.";
    }

    return $errorMsgEvent;
}

function validateDate($event_date) {
    $errorMsgDate = array();

    if ($event_date == "" || $event_date == null) {
        $errorMsgDate[] = "Please enter date.";
    }
    return $errorMsgDate;
}

function validateDetail($event_detail) {
    $errorMsgDetail = array();

    if ($event_detail == "" || $event_detail == null) {
        $errorMsgDetail[] = "Please enter event detail.";
    }
    return $errorMsgDetail;
}

?>