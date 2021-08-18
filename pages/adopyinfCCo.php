<?php
session_start();
if (isset($_SESSION['login'])) {
    require "../config/db_con.php";
    $id = $_GET['id'];
    $query = "SELECT firstname,lastname,number,name,type,breed,age,gender,state,city,image,img_type,post_date FROM users JOIN animals on users.id = ownerId and animals.id=$id";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
} else exit(header('Location:../authentication/access.php'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addadopy-info.css">
    <title>Document</title>
</head>

<body>
    <div class="container info">
        <div class="info-box py-6">

            <header class="heading center py-2">
                <span>INFO</span>
            </header>

            <div class="visual-info-box">
                <div class="adopy-img">
                    <?php echo "<img src='data:" . ($row['img_type']) . ";base64," . base64_encode($row['image']) . "'>" ?>
                </div>
                <div class="adopy-name center py-2">
                    <span class="h1"><?php echo $row['name']; ?></span>
                </div>
            </div>

            <main class="data-container">
                <div class="row">
                    <div class="head">
                        <span>Adopy Info</span>
                    </div>
                </div>
                <div class="adopy-info">
                    <div class="data-item">
                        <label for="name">Type: </label>
                        <output><?php echo $row['type']; ?></output>
                    </div>
                    <div class="data-item">
                        <label for="name">Breed: </label>
                        <output><?php echo $row['breed']; ?></output>
                    </div>
                    <div class="data-item">
                        <label for="name">Age: </label>
                        <output><?php echo $row['age']; ?></output>
                    </div>
                    <div class="data-item">
                        <label for="name">Gender: </label>
                        <output><?php echo $row['gender']; ?></output>
                    </div>
                    <div class="data-item">
                        <label for="name">State: </label>
                        <output><?php echo $row['state']; ?></output>
                    </div>
                    <div class="data-item">
                        <label for="name">City: </label>
                        <output><?php echo $row['city']; ?></output>
                    </div>
                    <div class="data-item">
                        <label for="name">Post Date</label>
                        <output><?php echo $row['post_date']; ?></output>
                    </div>
                </div>
                <hr class="mx-2">
                <div class="row">
                    <div class="head">
                        <span>Owner Info</span>
                    </div>
                    <div class="owner-info">
                        <div class="data-item">
                            <label for="name">First Name: </label>
                            <output><?php echo $row['firstname']; ?></output>
                        </div>
                        <div class="data-item">
                            <label for="name">Last Name: </label>
                            <output><?php echo $row['lastname']; ?></output>
                        </div>
                        <div class="data-item">
                            <label for="name">Contact Number: </label>
                            <output><?php echo $row['number']; ?></output>
                        </div>
                    </div>
                </div>
            </main>

            <div class="home-btn center py-2"><a href="../index.php">Home</a></div>

        </div>
    </div>
</body>

</html>
<?php $con->close(); ?>


