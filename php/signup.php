<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = 0;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    if (
        empty(trim($fname)) || !preg_match("/^[a-zA-Z]{3,15}$/", $fname) || empty(trim($lname))
        || !preg_match("/^[a-zA-Z]{3,15}$/", $lname) || empty(trim($number)) || !preg_match("/^\d{10}$/", $number) || empty(trim($email))
        || (!filter_var($email, FILTER_VALIDATE_EMAIL)) || (empty(trim($passwd))) || (strlen($passwd) < 5)
    ) {
        $error = 1;
    } else {
        require '../config/db_con.php';
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        if (($con->query("SELECT * FROM users WHERE number='$number'"))->num_rows != 0) {
            $error = 2;
        } else if ($con->query("SELECT * FROM users WHERE email='$email'")->num_rows != 0) {
            $error = 3;
        } else {
            $query = "INSERT INTO users(firstname,lastname,number,email,password) VALUES('$fname','$lname','$number','$email','$passwd');";
            if ($con->query($query)) {
                $error = 4;
            }
        }
    }
    echo $error;
}
