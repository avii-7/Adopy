<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (empty($email) || empty($pass)) {
        $error = 1;
    } else {
        require '../config/db_con.php';
        $query = "SELECT * FROM users WHERE email='$email';";
        $result = $con->query($query);
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['firstName'];
                $error = 7;
            } else $error = 5;
        } else $error = 6;
        $con->close();
    }
}
echo $error;
