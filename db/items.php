<?php 
include ('../config/config.php') ; 

if(isset($_POST['term'])){
        $param_term = $_POST['term'];
        $sql = "SELECT * FROM Sushi WHERE SushiName = '". $param_term ."'" ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {                   
                // output data of each row
                while($item = $result->fetch_assoc()) {
                        $item =
                        "<tr><td class='sustainable'></td>
                        <td class='name'>{$item['SushiName']}{$item['Origin']}{$item['Sustainability']}</td>
                        <td class='price'>{$item['SushiPrice']}</td>
                        <td class='price'>{$item['SashimiPrice']}</td></tr>\n";
                        $trimed = trim($item);
                        echo $trimed;  
                        }                              
                }else{
                        echo "0 results (isset)";
               }                        
}
//Close database connection
mysqli_close($conn);
?>