<!DOCTYPE html>
<html>
<head>
<title>Menus</title>
<link rel="stylesheet" href="css/style-screen.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print">
<!--TheSans SemiBold Plain for fonts-->
<link href="https://www.fontify.me/wf/6514f686806e01956673c98cf63e22f4" rel="stylesheet" type="text/css">
<!--TheMix SemiBold Plain for numbers-->
<link href="https://www.fontify.me/wf/23fc8aeff6d6c9c416b65c54dbd9c4e8" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

</head>
<body>
   <?php include ('db/items-back.php') ;?> 
<div id="nav">
    <a href="main.php" id="nav"><img src="images/sushi_icon.png" class="nav_icons">
    <p id="nav">Sushi Menu</p></a>
    <a href="edit.php" id="nav"><img src="images/edit_icon.png" class="nav_icons">
    <p id="nav">Edit Items</p></a>
    <a href="add_form.php" id="nav"><img src="images/add_icon.png" class="nav_icons">
    <p id="nav">Add Items</p></a>
</div> 
