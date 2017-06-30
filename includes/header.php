<!DOCTYPE html>
<html>
<head>
<title><?=$myTitle?></title>
<link rel="stylesheet" href="css/style-screen.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print">
<!--TheSans SemiBold Plain for fonts-->
<link href="https://www.fontify.me/wf/6514f686806e01956673c98cf63e22f4" rel="stylesheet" type="text/css">
<!--TheMix SemiBold Plain for numbers-->
<link href="https://www.fontify.me/wf/23fc8aeff6d6c9c416b65c54dbd9c4e8" rel="stylesheet" type="text/css">
<!--Google Open Sans-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<style>
    .draggable {border: 1px solid #ccc;}
  /*.draggable { width: 90px; height: 90px; padding: 0.5em; float: left; margin: 0 10px 10px 0; }
  #draggable, #draggable2 { margin-bottom:20px; }
  #draggable { cursor: n-resize; }
  #draggable2 { cursor: e-resize; }
  #containment-wrapper { width: 95%; height:150px; border:2px solid #ccc; padding: 10px; }
  h3 { clear: left; }*/
  </style>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
   <?php include ("config.php");?>
<div id="nav">
    <?php echo"<a href='main.php' id='nav'><img src='images/sushi_icon" . $activeNav1 . ".png' class='nav_icons'> 
    <p id='" . $activeP1 . "'>Sushi Menu</p></a>";?>
    <?php echo"<a href='ippin.php' id='nav'><img src='images/ippin_icon" . $activeNav2 . ".png' class='nav_icons'> 
    <p id='" . $activeP2 . "'>Ippin Menu</p></a>";?>
    <?php echo"<a href='edit.php' id='nav'><img src='images/edit_icon" . $activeNav3 . ".png' class='nav_icons'>
    <p id='" . $activeP3 . "'>Edit Items</p></a>";?>
    <?php echo"<a href='add_form.php' id='nav'><img src='images/add_icon" . $activeNav4 . ".png' class='nav_icons'>
    <p id='" . $activeP4 . "'>Add Items</p></a>";?>
</div> 
