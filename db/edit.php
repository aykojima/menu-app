<?php 
include ('../config/config.php') ; 

if(isset($_POST['term'])){
        $param_term = $_POST['term'];
        $sql = "SELECT SushiKey, Sustainability, SushiName, Origin, SushiPrice, SashimiPrice FROM Sushi WHERE SushiKey = '". $param_term ."'" ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {         
            $items = array();          
                while($item = $result->fetch_assoc()) {
                        $items [] = $item;
                        }
                        echo json_encode($items);                                
                }else{
                        echo "0 results (isset)";
               }                        
}else{
    // Escape user inputs for security
    $sushiKey = (int)$_REQUEST['sushi_key'];
    
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
    $sql = "UPDATE Sushi SET Sustainability = '$sustainability', SushiName = '$name', Origin = '$origin', 
    SushiPrice = '$sushiPrice', SashimiPrice = '$sashimiPrice' WHERE SushiKey = '$sushiKey'"; 

if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>window.alert('" . $name . " was edited successfully');
    window.location.href = '../edit.php';</script>"; 
exit;
} else{
    echo "<script type='text/javascript'>window.alert('ERROR: Could not able to edit " . $name . "');
    window.location.href = '../add_form.php';</script>"; 
}
}
//Close database connection
mysqli_close($conn);
?>




