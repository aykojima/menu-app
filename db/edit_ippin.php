<?php 
include ('../config/config.php') ; 

if(isset($_POST['term_ippin'])){
        $param_term = $_POST['term_ippin'];
        $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category 
        FROM Ippins WHERE IppinKey = '". $param_term ."'" ;
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
    $ippin_key = (int)$_REQUEST['ippin_key'];
    
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

    $price= mysqli_real_escape_string($conn, $_REQUEST['price']);
    $price = '(' . strtoupper($price) . ')';

    $category = $_REQUEST['category'];
 
    // attempt insert query execution
    $sql = "UPDATE Ippins SET GF = '$gf', Sustainability = '$sustainablity', IppinName = '$name', 
    Category = '$category' WHERE IppinKey = '$ippin_key'"; 

if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'>window.alert('" . $name . " was edited successfully');
    window.location.href = '../edit_ippin.php';</script>"; 
exit;
} else{
    echo "<script type='text/javascript'>window.alert('ERROR: Could not able to edit " . $name . "');
    window.location.href = '../add_ippin.php';</script>"; 
}
}
//Close database connection
mysqli_close($conn);
?>




