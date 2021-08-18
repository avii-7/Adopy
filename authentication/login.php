<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $valid = true;
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    if (empty($email)) {
        $error = 14;
    } else if (empty($pass)) {
        $error = 15;
    } else {
        require '../config/db_con.php';
        $query = "SELECT * FROM users WHERE email='$email';";
        $result = $con->query($query);
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($_POST['pwd'], $row['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['firstname'];
                $error = 18;
            } else $error = 17;
        } else $error = 16;
        $con->close();
    }
}
echo $error;
?>