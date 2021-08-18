<?php
if (isset($_POST['submit'])) {
    include "../config/db_con.php";
    // $type = mime_content_type($_FILES['image']['tmp_name']);
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    // echo $image;
    $query = "insert into img_demo(images) values('$image');";
    if ($con->query($query)) {
        echo "Done";
    } else {
        echo $con->error;
    }
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