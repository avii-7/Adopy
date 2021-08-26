<?php
session_start();
if (isset($_SESSION['login'])) {
    require "../config/db_con.php";
    $id = $_GET['id'];
    $query = "SELECT firstName,lastName,number,name,type,breed,age,gender,state,city,image,imageType,postDate FROM users JOIN animals on users.id = ownerId and animals.id=$id";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
?>
    <div id="card-wrapper" class="info">
        <div class="card" id="info-bg">
            <div class="card-img">
                <?php echo "<img src='data:" . ($row['imageType']) . ";base64," . base64_encode($row['image']) . "'>" ?>
            </div>
            <div class="card-body">
                <div class="card-info">
                    <div class="heading-2">
                        <h1>ADOPY DETAILS</h1>
                    </div>
                    <label><i class="fas fa-vr-cardboard"></i>Name: <span><?php echo $row['name']; ?></span></label>
                    <label><i class="fas fa-paw"></i>Type: <span> <?php echo $row['type']; ?></span></label>
                    <label><i class="fas fa-heart"></i>Breed: <span> <?php echo $row['breed']; ?></span></label>
                    <label><i class="fas fa-long-arrow-alt-up" title="Age"></i>Age: <span> <?php echo $row['age']; ?></span></label>
                    <label><i class="fas fa-venus-mars"></i>Gender: <span> <?php echo $row['gender']; ?></span></label>
                    <label><i class="fas fa-home"></i>Home: <span><?php echo $row['city'] . ", " . $row['state']; ?></span></label>
                    <label><i class="fas fa-clock"></i>Post Date: <span><?php echo $row['postDate']; ?></span></label>
                </div>
                <div class="card-info">
                    <div class="heading-2">
                        <h1>OWNER DETAILS</h1>
                    </div>
                    <label><i class="fas fa-user"></i>Name: <span><?php echo $row['firstName'], " ", $row['lastName']; ?></span></label>
                    <label><i class="fas fa-phone-alt"></i>Contact number:<span> <?php echo $row['number']; ?></span></label>
                </div>
                <div class="card-btn center">
                    <button onclick="fetchPosts();">Home</button>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
<?php } ?>