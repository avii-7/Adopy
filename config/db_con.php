<?php
require 'constants.php';
$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
if ($con->connect_error) die("Connection failed:" . $con->connect_error);
