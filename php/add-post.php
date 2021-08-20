<?php
if (isset($_POST['submit'])) {
    include "../config/db_con.php";
    $name = $_POST['name'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $ownerId = 9;
    $state = $_POST['state'];
    $city = $_POST['city'];
    $avail = 1;
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    // echo addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $img_type = mime_content_type($_FILES['image']['tmp_name']);


    $query = "insert into animals (name, type, breed, age, gender, ownerId, state, city, avail, image, imageType)
     values('$name','$type','$breed',$age,'$gender',$ownerId,'$state','$city',$avail,'$image','$img_type');";

    // if ($con->query($query))  header('Location:../index.php');
    // else echo $con->error;
    if ($con->query($query)) echo "done";
    else echo $con->error;
}
?>

