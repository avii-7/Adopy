<?php
require "../config/db_con.php";
$sql = 'select image_data from testtb3;';
$result = $con->query($sql);
// result is holidng an array
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<img src='data:image/png;base64," . base64_encode($row['image_data']) . "' width='100'";
            }
        }
        ?>
    </div>
</body>

</html>