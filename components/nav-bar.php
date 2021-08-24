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
        <li> <button onclick="home();openMenu();">Home</button> </li>
        <li> <button onclick="openMenu();">Cat</button> </li>
        <li> <button onclick="openMenu();">Dog</button> </li>
        <?php if ($flag == true) { ?>
            <li> <button onclick="getData(getURL(8),updateMain);openMenu();">My Profile</button> </li>
            <li> <button onclick="doit();openMenu();">Logout</button> </li>
        <?php } else { ?>
            <li> <button onclick="getData(getURL(2),updateMain);openMenu();" a>Signup</button> </li>
            <li> <button onclick="getData(getURL(3),updateMain);openMenu();">Login</button> </li>
        <?php } ?>
        <li id="add-btn"><button class="add-adoby-btn" onclick="getData(getURL(7),updateMain);openMenu();"><i class="fas fa-plus"></i> Adopy</button> </li>
    </ul>
</nav>