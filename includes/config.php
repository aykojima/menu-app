<?php 
//this line below identifies the current page
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

/* below we can create 'case' statements to accommodate
 unique data items (title, a page id and an image) that will
reside in the 'header.php' file
*/
switch(THIS_PAGE)
{
  case "main.php":
  $myTitle = "Main";
  $file = "main";
  $activeNav1 = "_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeP1 = "nav_active";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav";
  break;

  case "ippin.php":
  $myTitle = "Ippin";
  $file = "ippin";
  $activeNav1 = "_no_active";
  $activeNav2 = "_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav_active";
  $activeP3 = "nav";
  $activeP4 = "nav";
  break;
  
  case "edit_sushi.php":
  $myTitle = "Edit Sushi Item";
  $file = "edit";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_active";
  $activeNav4 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav_active";
  $activeP4 = "nav";
  break; 
  
  case "edit_ippin.php":
  $myTitle = "Edit Ippin Item";
  $file = "edit_ippin";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_active";
  $activeNav4 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav_active";
  $activeP4 = "nav";
  break; 


  case "add_sushi.php":
  $myTitle = "Add Sushi Item";
  $file = "add";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav_active";

  case "add_ippin.php":
  $myTitle = "Add Ippin Item";
  $file = "add_ippin";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav";
  $activeP4 = "nav_active";


  break; 
  //fallback values for undefined pages
  default:
  $myTitle = THIS_PAGE; #the file name is unique
  $activeNav = "";
}