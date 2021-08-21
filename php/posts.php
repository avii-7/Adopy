<?php
require "../config/db_con.php";
$offset = $_GET['offset'];
$query = "SELECT * FROM animals WHERE avail=1 ORDER BY postDate DESC LIMIT $offset, 3";
$result = $con->query($query);
if ($result->num_rows != 0) { ?>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="card">
            <div class="card-img">
                <?php echo "<img src='data:" . ($row['imageType']) . ";base64," . base64_encode($row['image']) . "'>" ?>
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
                    <label><i class="far fa-clock"></i><span><?php echo $row['postDate']; ?></span></label>
                </div>
                <div class="card-btn center">
                    <button onclick="getData('php/post-info.php?id=<?php echo ($row['id']); ?>',updateMain)">Adopt</button>
                </div>
            </div>
        </div>
    <?php } ?>
<?php $con->close();
} ?>