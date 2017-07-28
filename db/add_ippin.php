<?php 
include ('database.php') ; 


// Escape user inputs for security
$sustainability = true;
if(isset($_POST['sustainability'])){
    //$stok is checked and value = 1
    $sustainability = true;
}
else{
    //$stok is nog checked and value=0
    $sustainability=false;
}

$gf = true;
if(isset($_POST['gf'])){
    //$stok is checked and value = 1
    $gf = true;
}
else{
    //$stok is nog checked and value=0
    $gf=false;
}



$name = $db->escape_value($_REQUEST['name']);
$name = ucfirst($name);

$price = $db->escape_value($_REQUEST['price']);
$price = strtoupper($price); 

$category = $_REQUEST['category'];




// attempt insert query execution
$sql = "INSERT INTO Ippins (GF, Sustainability, IppinName, IppinPrice, Category) 
        VALUES ('$gf', '$sustainability','$name', '$price', '$category')";
if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>window.alert('" . $name . " was added successfully');
    window.location.href = '../add_ippin.php';</script>"; 
exit;
} else{
    echo "<script type='text/javascript'>window.alert('ERROR: Could not able to add " . $name . "');
    window.location.href = '../add_ippin.php';</script>"; 
}

//Close database connection
$db->close_connection();
?>