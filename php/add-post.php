<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../config/db_con.php";
    $name = $_POST['name'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $ownerId = 12;
    $state = $_POST['state'];
    $city = $_POST['city'];
    $avail = 1;

    if (
        empty(trim($name)) || empty(trim($type)) || empty(trim($breed)) || empty(trim($age)) || empty(trim($gender)) || empty(trim($state))
        || empty(trim($city)) || !preg_match("/^[a-zA-Z\s]{3,15}$/", $name) || !preg_match("/^[a-zA-Z]{3,15}$/", $type) 
        || !preg_match("/^[a-zA-Z]{3,15}$/", $breed) || !preg_match("/^[\d]{1,2}$/", $age) || !preg_match("/^[a-zA-Z]{2,9}$/", $gender) 
        || !preg_match("/^[a-zA-Z]{3,30}$/", $state) || !preg_match("/[a-zA-Z]{3,30}$/", $city) | !isset($_FILES['image'])
    ) {
        $result = 1;
    } else {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $img_type = mime_content_type($_FILES['image']['tmp_name']);
        $query = "insert into animals (name, type, breed, age, gender, ownerId, state, city, avail, image, imageType)
        values('$name','$type','$breed',$age,'$gender',$ownerId,'$state','$city',$avail,'$image','$img_type');";
        if ($con->query($query)) $result = 8;
    }
    echo $result;
}
