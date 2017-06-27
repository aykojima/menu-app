<?php 
include ('../config/config.php') ; 

if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = "SELECT * FROM Sushi WHERE SushiName LIKE ?";
 
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST['term'] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p id='" . $row[SushiKey] .  "'>" . $row["SushiName"] . " " .$row["Origin"] . "</p>";
                }
            }else if(isset($_REQUEST['term']) && $_REQUEST['term'] == '+'){
                echo "<p id='addall'>add sample 30 items to the menu</p>";
            }else if(isset($_REQUEST['term']) && $_REQUEST['term'] == '-'){
                echo "<p id='empty'>empty the menu</p>";
            }else{
                echo "<p id='nomatch'>No matches found. <a href='http://ayumik.com/skt/add_form.php' target='_blank''>Add New Item</a></p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conn);
?>

