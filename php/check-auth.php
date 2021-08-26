<!-- ------------------------ Check Authentication ------------------------- -->

<?php 
    session_start();
 if (isset($_SESSION['login']) && $_SESSION['login'] == true) echo true;   
 else echo false;
 ?>
