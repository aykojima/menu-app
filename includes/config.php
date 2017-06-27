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
  $activeNav1 = "_no_active";
  $activeNav2 = "_active";
  $activeNav3 = "_no_active";
  $activeNav4 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav_active";
  $activeP3 = "nav";
  $activeP4 = "nav";
  break;
  
  case "edit.php":
  $myTitle = "Edit Item";
  $activeNav1 = "_no_active";
  $activeNav2 = "_no_active";
  $activeNav3 = "_active";
  $activeNav4 = "_no_active";
  $activeP1 = "nav";
  $activeP2 = "nav";
  $activeP3 = "nav_active";
  $activeP4 = "nav";
  break; 
  
  case "add_form.php":
  $myTitle = "Add Item";
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