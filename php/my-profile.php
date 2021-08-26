<?php
require "../config/db_con.php";
$id = 12;
$query = "SELECT id,name,type,breed,age,gender,state,city,image,avail,imageType,postDate FROM animals WHERE ownerId=12";
