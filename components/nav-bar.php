<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $flag = true;
} else {
    $flag = false;
}
?>


<span class="brand-title h1">ADOPY</span>
<div class="menu" onclick="openMenu()">
    <div class="bar bar-1"></div>
    <div class="bar bar-2"></div>
    <div class="bar bar-3"></div>
</div>
<nav class="nav-bar-links">
    <ul>
        <li> <button onclick="home();">Home</button> </li>
        <li> <button>Cat</button> </li>
        <li> <button>Dog</button> </li>
        <?php if ($flag == true) { ?>
            <li> <button>My Profile</button> </li>
            <li> <button onclick="doit('authentication/logout')">Logout</button> </li>
        <?php } else { ?>
            <li> <button onclick="getData('authentication/signup.html')">Signup</button> </li>
            <li> <button onclick="getData('authentication/login.html')">Login</button> </li>
        <?php } ?>
        <li id="add-btn"><button class="add-adoby-btn" href="pages/addadopy.php"><i class="fas fa-plus"></i> Adopy</button> </li>
    </ul>
</nav>