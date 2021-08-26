<?php
require 'constants.php';
$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
if ($con->connect_errno) die("Connection failed: " . $con->connect_errno);
