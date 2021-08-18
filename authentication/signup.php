<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = 0;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    if (empty(trim($fname))) {
        $error = 1;
    } else if (!preg_match("/^[a-zA-Z]{3,15}$/", $fname)) {
        $error = 2;
    } else if (empty(trim($lname))) {
        $error = 3;
    } else if (!preg_match("/^[a-zA-Z]{3,15}$/", $lname)) {
        $error = 4;
    } else if (empty(trim($number))) {
        $error = 5;
    } else if (!preg_match("/^\d{10}$/", $number)) {
        $error = 6;
    } else if (empty(trim($email))) {
        $error = 7;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 8;
    } else if (empty(trim($passwd))) {
        $error = 9;
    } else if (strlen($passwd) < 5) {
        $error = 10;
    } else {
        // Sanitize for remove illegal characters FROM email like (),spaces,//
        // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        require '../config/db_con.php';
        if (($con->query("SELECT * FROM users WHERE number='$number'"))->num_rows != 0) {
            $error = 11;
        } else if ($con->query("SELECT * FROM users WHERE email='$email'")->num_rows != 0) {
            $error = 12;
        } else {
            // query() return 1 on success else blank
            $query = "INSERT INTO users(firstname,lastname,number,email,password) VALUES('$fname','$lname','$number','$email','$passwd');";
            if ($con->query($query)) {
                $error = 13;
            } else {
                $error = 14;
            }
        }
    }
    echo $error;
}
