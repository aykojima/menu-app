<?php 
include ('database.php') ; 

//$courses = array();

function getLunchItems($i)
{
        global $db;
        $sql = "SELECT LunchKey, ItemName, ItemPrice, ItemDescription
        FROM Lunch WHERE LunchKey = '$i'";

        $results = $db->query($sql);
        //$row_cnt = $results->num_rows;
        $lunch_item = $db->fetch_assoc($results);
        //mysqli_close();
        return $lunch_item;
       // echo mysql_result($results, 0);
}

$gozen_include1 = getLunchItems(1);
$gozen_include2 = getLunchItems(2);
$gozen_include3 = getLunchItems(3);
$gozen_include4 = getLunchItems(4);
$gozen_sub = getLunchItems(5);
$gozen_add1 = getLunchItems(6);
$gozen_add2 = getLunchItems(7);

$asa_gozen = getLunchItems(8);
$hiru_gozen = getLunchItems(9);
$nigiri_gozen = getLunchItems(10);

$combo_include = getLunchItems(11);
$combo_sub = getLunchItems(12);

$combo1 = getLunchItems(13);
$combo2 = getLunchItems(14);
$combo3 = getLunchItems(15);
$combo4 = getLunchItems(16);

$tempura_udon = getLunchItems(17);
$tempura_udon_combo = getLunchItems(18);

$lunch_ippin1 = getLunchItems(19);
$lunch_ippin2 = getLunchItems(20);
$lunch_ippin3 = getLunchItems(21);
$lunch_ippin4 = getLunchItems(22);

$tonkatsu_include = getLunchItems(23);
$tonkatsu = getLunchItems(24);
$hire_katsu = getLunchItems(25);
$combo_katsu = getLunchItems(26);
?>