<?php
// session_start();
// if (isset($_SESSION['login'])) {
require "../config/db_con.php";
$id = $_GET['id'];
// $id = 2;
$query = "SELECT firstname,lastname,number,name,type,breed,age,gender,state,city,image,img_type,post_date FROM users JOIN animals on users.id = ownerId and animals.id=$id";
$result = $con->query($query);
$row = $result->fetch_assoc();
// } else exit(header('Location:../authentication/access.php'));
?>
<div id="card-wrapper" class="info">
    <div class="card" id="info-bg">
        <div class="card-img">
            <?php echo "<img src='data:" . ($row['img_type']) . ";base64," . base64_encode($row['image']) . "'>" ?>
        </div>
        <div class="card-body">
            <div class="card-info">
                <span class="heading center">Adopy details</span>
                <label><i class="fas fa-vr-cardboard"></i>Name: <span><?php echo $row['name']; ?></span></label>
                <label><i class="fas fa-paw"></i>Type: <span> <?php echo $row['type']; ?></span></label>
                <label><i class="fas fa-heart"></i>Breed: <span> <?php echo $row['breed']; ?></span></label>
                <label><i class="fas fa-long-arrow-alt-up" title="Age"></i>Age: <span> <?php echo $row['age']; ?></span></label>
                <label><i class="fas fa-venus-mars"></i>Gender: <span> <?php echo $row['gender']; ?></span></label>
                <label><i class="fas fa-home"></i>Home: <span><?php echo $row['city'] . ", " . $row['state']; ?></span></label>
                <label><i class="fas fa-clock"></i>Post Date: <span><?php echo $row['post_date']; ?></span></label>
            </div>
            <div class="card-info">
                <span class="heading center">Owner details</span>
                <label><i class="fas fa-user"></i>Name: <span><?php echo $row['firstname'], " ", $row['lastname']; ?></span></label>
                <label><i class="fas fa-phone-alt"></i>Contact number:<span> <?php echo $row['number']; ?></span></label>
            </div>
            <div class="card-btn center">
                <button onclick="home()">Home</button>
            </div>
        </div>
    </div>
</div>