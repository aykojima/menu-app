<?php 
include ('../config/config.php') ; 


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

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$name = ucfirst($name);

$origin= mysqli_real_escape_string($conn, $_REQUEST['origin']);
$origin = '(' . ucfirst($origin) . ')';

$sushiPrice = (int)$_REQUEST['sushi_price'];
$sashimiPrice = (int)$_REQUEST['sashimi_price'];
 
// attempt insert query execution
$sql = "INSERT INTO Sushi (Sustainability, SushiName, Origin, SushiPrice, SashimiPrice) 
        VALUES ('$sustainability', '$name', '$origin', '$sushiPrice', '$sashimiPrice')";
if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>window.alert('" . $name . " was added successfully');
    window.location.href = '../add_form.php';</script>"; 
exit;
} else{
    echo "<script type='text/javascript'>window.alert('ERROR: Could not able to add " . $name . "');
    window.location.href = '../add_form.php';</script>"; 
}

//Close database connection
mysqli_close($conn);
?>