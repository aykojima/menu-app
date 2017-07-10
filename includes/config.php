<?php 
//this line below identifies the current page
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
$titleNames = array("sushi", "ippin", "rolls", "edit", "add");
$upperTitleName = ucfirst($titleName);
$i = $key + 1;
$activeNav = ${'activeNav' . $i}; 
$activeP = ${'activeP' . $i}; 
/* below we can create 'case' statements to accommodate
 unique data items (title, a page id and an image) that will
reside in the 'header.php' file
*/

switch(THIS_PAGE)
{
  case "sushi.php":
  $myTitle = "Sushi";
  $file = "sushi";
  $activeNav1 = "_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeNav5 = "_no_active";
  $activeP1 = "nav_active";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav";
  $activeP5 = "nav";
  break;

  case "ippin.php":
  $myTitle = "Ippin";
  $file = "ippin";
  $activeNav1 = "_no_active";
  $activeNav2 = "_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeNav5 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav_active";
  $activeP3 = "nav";
  $activeP4 = "nav";
  $activeP5 = "nav";
  break;
  
   case "rolls.php":
  $myTitle = "Rolls";
  $file = "rolls";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_active";
  $activeNav4 = "_no_active";
  $activeNav5 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav_active";
  $activeP4 = "nav";
  $activeP5 = "nav";
  break;


  case "edit_sushi.php":
  $myTitle = "Edit Sushi Item";
  $file = "edit_sushi";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_active";
  $activeNav5 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav_active";
  $activeP5 = "nav";
  break; 
  
  case "edit_ippin.php":
  $myTitle = "Edit Ippin Item";
  $file = "edit_ippin";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_active";
  $activeNav5 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav_active";
  $activeP5 = "nav";
  break; 

  case "edit_rolls.php":
  $myTitle = "Edit Rolls Item";
  $file = "edit_rolls";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_active";
  $activeNav5 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav_active";
  $activeP5 = "nav";
  break; 


  case "add_sushi.php":
  $myTitle = "Add Sushi Item";
  $file = "add_sushi";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeNav5 = "_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav";
  $activeP5 = "nav_active";
  break; 

  
  case "add_ippin.php":
  $myTitle = "Add Ippin Item";
  $file = "add_ippin";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeNav5 = "_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav";
  $activeP5 = "nav_active";
  break; 


  case "add_rolls.php":
  $myTitle = "Add Rolls Item";
  $file = "add_rolls";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeNav5 = "_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav";
  $activeP5 = "nav_active";
  //fallback values for undefined pages
  default:
  $myTitle = THIS_PAGE; #the file name is unique
  $activeNav = "";
}