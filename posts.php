<?php
require "config/db_con.php";
$offset = $_GET['offset'];
$query = "SELECT * FROM animals WHERE available=1 ORDER BY post_date DESC LIMIT $offset, 6";
$result = $con->query($query);
//result contains an object...
if ($result->num_rows != 0) { ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
            <div class="card-img">
                <?php echo "<img src='data:" . ($row['img_type']) . ";base64," . base64_encode($row['image']) . "'>" ?>
            </div>
            <div class="card-name center">
                <span><?php echo $row['name']; ?></span>
            </div>
            <div class="card-body">
                <div class="card-info">
                    <label><i class="fas fa-home"></i> <span><?php echo $row['city'] . ", " . $row['state']; ?></span></label>
                    <label><i class="fas fa-venus-mars"></i> <span> <?php echo $row['gender']; ?></span></label>
                    <label><i class="fas fa-long-arrow-alt-up"></i> <span><?php echo $row['age']; ?> </span></label>
                    <label><i class="fas fa-dog"></i><span><?php echo $row['breed']; ?> </span></label>
                    <label><i class="far fa-clock"></i><span><?php echo $row['post_date']; ?></span></label>
                </div>
                <div class="card-btn center">
                    <button onclick="getData('pages/adopyinfo.php?id=<?php echo ($row['id']); ?>',updateMain)">Adopt</button>
                </div>
            </div>
        </div>
    <?php } ?>
<?php $con->close();
} ?>