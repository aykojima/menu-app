<?php include ("config.php");?>
<?php 
require_once("../db/database.php");
require_once("../db/session.php");
require_once("../db/function.php");
require_once("../db/user.php");

if($session->is_logged_in() == false){
    redirect_to("login.php");
}
?>



<!DOCTYPE html>
<html>
<head>
<title><?=$myTitle?></title>
<link rel="stylesheet" href="../css/style-screen.css" type="text/css" media="screen">
<link rel="stylesheet" href="../css/style-print.css" type="text/css" media="print">
<!--
<!--TheSans SemiBold Plain for fonts
<link href="https://www.fontify.me/wf/6514f686806e01956673c98cf63e22f4" rel="stylesheet" type="text/css">
<!--TheMix SemiBold Plain for numbers
<link href="https://www.fontify.me/wf/23fc8aeff6d6c9c416b65c54dbd9c4e8" rel="stylesheet" type="text/css">
<!--TheSans light plain
<link href="https://www.fontify.me/wf/266e446477c15c5c2b398f427c98b308" rel="stylesheet" type="text/css">
<!--TheSans regular
<link href="https://www.fontify.me/wf/782907cfe0a58dd46f3565a977edf595" rel="stylesheet" type="text/css">
<!--Google Open Sans
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
-->

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<header>
<ul>
    
    <li id="logout"><a href ="logout.php">Logout</a></li>
    <li id="print"><a href="javascript: window.print()">Print</a></li>
    <li id="style"><a href="javascript: location.reload()">Style menu</a></li>
    <li><a onclick="show_items()">Search</a></li>
</ul>

</header>   
<div id="nav">
    <ul>
        <?php 
        $titleNames = array("sushi", "ippin", "lunch", "rolls", "course", "edit", "add"); 
        foreach($titleNames as $key => $titleName){
            $upperTitleName = ucfirst($titleName);
            $i = $key + 1;
            $activeNav = ${'activeNav' . $i}; 
            $activeP = ${'activeP' . $i}; 
           if($key >= 5){
                echo"<li><a href='#' id='nav'><img src='../images/" . $titleName . "_icon" . $activeNav . ".png' class='nav_icons'>
                    <p id='" . $activeP . "'>" . $upperTitleName . " Items</p></a>
                    <ul>
                    <li><a href='" . $titleName . "_sushi.php'>" . $upperTitleName . " Sushi</a></li>
                    <li><a href='" . $titleName . "_ippin.php'>" . $upperTitleName . " Ippin</a></li>
                     <li><a href='" . $titleName . "_lunch.php'>" . $upperTitleName . " Lunch</a></li>
                    <li><a href='" . $titleName . "_rolls.php'>" . $upperTitleName . " Rolls</a></li>
                    <li><a href='" . $titleName . "_course.php'>" . $upperTitleName . " Course</a></li>
                    </ul></li>";
            }else if($key ==2){
                echo"<li><a href='#' id='nav'><img src='../images/" . $titleName . "_icon" . $activeNav . ".png' class='nav_icons'>
                    <p id='" . $activeP . "'>" . $upperTitleName . " Items</p></a>
                    <ul>
                        <li><a href='weekend_" . $titleName . ".php'>Weekend</a></li>
                        <li><a href='weekday_" . $titleName . ".php'>Weekday</a></li>
                    </ul></li>";
            }else{
                echo"<li><a href='" . $titleName . ".php' id='nav'><img src='../images/" . $titleName . "_icon" . $activeNav . ".png' class='nav_icons'> 
                <p id='" . $activeP . "'>" . $upperTitleName . " Menu</p></a></li>";
            }
} ?>

<!-- <?php //var_dump( $session->is_logged_in()); ?>
<?php //echo $session->user_id; ?> -->

    </ul>
    <!-- <a id="print" href="javascript: window.print()">PRINT</a> -->
</div> 