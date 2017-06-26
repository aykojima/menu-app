<?php 
include ('../config/config.php') ; 

if(isset($_POST['term'])){
        $param_term = $_POST['term'];
        $sql = "SELECT Sustainability, SushiName, Origin, SushiPrice, SashimiPrice, SushiKey FROM Sushi WHERE SushiKey = '". $param_term ."'" ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {                   
                // output data of each row
                while($item = $result->fetch_assoc()) {
                        $item =
                        "<td class='sustainable'></td>
                        <td class='name'>{$item['SushiName']}</td>
                        <td class='origin'> {$item['Origin']}</td>
                        <td class='price'id='{$item['SushiKey']}'>{$item['SushiPrice']}</td>
                        <td class='space'></td>
                        <td class='price'id='{$item['Sustainability']}'>{$item['SashimiPrice']}</td>";
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