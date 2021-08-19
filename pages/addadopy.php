<?php
if (isset($_POST['submit'])) {
    include "../config/db_con.php";
    $name = $_POST['name'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $ownerId = 1;
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/css/style.css">
    <link rel="stylesheet" href="../assests/css/padding.css">
    <title>Add a post</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">

        <!-- -------------------------------- Name --------------------------------- -->
        <div class="form-item">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </div>

        <!-- -------------------------------- Type --------------------------------- -->
        <div class="form-item">
            <label for="type">Type: </label>
            <select name="type" id="type">
                <option value="" disabled selected>Select a type</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
                <option value="other">Other</option>
            </select>
        </div>

        <!-- -------------------------------- Breed -------------------------------- -->
        <div class="form-item">
            <label for="breed">Breed: </label>
            <input type="text" name="breed" id="breed">
        </div>

        <!-- --------------------------------- Age --------------------------------- -->
        <div class="form-item">
            <label for="age">Age: </label>
            <input type="tel" name="age" id="age" maxlength="2">
        </div>

        <!-- ------------------------------- Gender -------------------------------- -->
        <div class="form-item">
            <label for="gender">Gender: </label>
            <input type="radio" name='gender' value="Male">
            <label for="male">Male</label>
            <input type="radio" name='gender' value="Female">
            <label for="male">Female</label>
        </div>

        <!-- -------------------------------- State -------------------------------- -->
        <div class="form-item">
            <label for="state">State</label>
            <select name="state" id="state">
                <option value="" selected disabled>Select state</option>
                <option value="Haryana">Haryana</option>
            </select>
        </div>

        <!-- -------------------------------- City --------------------------------- -->
        <div class="form-item">
            <label for="city">City</label>
            <select name="city" id="city">
                <option value="" selected disabled>Select city</option>
                <option value="Ambala">Ambala</option>
                <option value="Jagadhri">Jagadhri</option>
                <option value="Yamunanagar">Yamunanagar</option>
                <option value="Bahadurgarh">Bahadurgarh</option>
                <option value="Radaur">Radaur</option>
            </select>
        </div>

        <!-- -------------------------------- Image -------------------------------- -->
        <div class="form-item">
            <label for="name">Image: </label>
            <input type="file" accept="image/*" name="image" id="name">
        </div>

        <!-- ---------------------------- Submit Button ---------------------------- -->
        <div class="btn">
            <input type="submit" name='submit' value="Add a post">
        </div>
    </form>
</body>

</html>