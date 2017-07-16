<?php 
include ('config/config.php') ; 

//$courses = array();

function getLunchItems($i, $conn)
{
        $sql = "SELECT LunchKey, ItemName, ItemPrice, ItemDescription
        FROM Lunch WHERE LunchKey = '$i'";

        $results = $conn->query($sql);
        //$row_cnt = $results->num_rows;
        $lunch_item = $results->fetch_assoc();
        //mysqli_close($conn);
        return $lunch_item;
       // echo mysql_result($results, 0);
}

$gozen_include1 = getLunchItems(1, $conn);
$gozen_include2 = getLunchItems(2, $conn);
$gozen_include3 = getLunchItems(3, $conn);
$gozen_include4 = getLunchItems(4, $conn);
$gozen_sub = getLunchItems(5, $conn);
$gozen_add1 = getLunchItems(6, $conn);
$gozen_add2 = getLunchItems(7, $conn);

$asa_gozen = getLunchItems(8, $conn);
$hiru_gozen = getLunchItems(9, $conn);
$nigiri_gozen = getLunchItems(10, $conn);

$combo_include = getLunchItems(11, $conn);
$combo_sub = getLunchItems(12, $conn);

$combo1 = getLunchItems(13, $conn);
$combo2 = getLunchItems(14, $conn);
$combo3 = getLunchItems(15, $conn);
$combo4 = getLunchItems(16, $conn);

$tempura_udon = getLunchItems(17, $conn);
$tempura_udon_combo = getLunchItems(18, $conn);

$lunch_ippin1 = getLunchItems(19, $conn);
$lunch_ippin2 = getLunchItems(20, $conn);
$lunch_ippin3 = getLunchItems(21, $conn);
$lunch_ippin4 = getLunchItems(22, $conn);

$tonkatsu_include = getLunchItems(23, $conn);
$tonkatsu = getLunchItems(24, $conn);
$hire_katsu = getLunchItems(25, $conn);
$combo_katsu = getLunchItems(26, $conn);
?>