<?php 
include ('../config/config.php') ; 

if(isset($_POST['term'])){
        $param_term = $_POST['term'];
        $sql = "SELECT Sustainability, SushiName, Origin, SushiPrice, SashimiPrice, SushiKey 
        FROM Sushi WHERE SushiKey = '". $param_term ."'" ;
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
        }else if(isset($_POST['term']) && $_POST['term'] == "i"){
                $param_term = $_POST['term'];
                //$items = array();
                //for($i=1; $i<31; $i++)
                //{
                        $sql = "SELECT Sustainability, SushiName, Origin, SushiPrice, SashimiPrice, SushiKey 
                        FROM Sushi WHERE SushiKey = '". $i ."'" ;
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
                                        //array_push($items, $item); 
                                        $trimed = trim($item);
                        echo $trimed; 
                                        }
                        }
                //}
                //echo json_encode($items);
        }else{
                        echo "0 results (isset)";
        }                        
}

if(isset($_POST['ippin_term'])){
        $param_term = $_POST['ippin_term'];
        $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category
        FROM Ippins WHERE IppinKey = '". $param_term ."'" ;
        $result = $conn->query($sql);

        $array = [];
        if ($result->num_rows > 0) {                   
                // output data of each row
                while($item = $result->fetch_assoc()) {
                         $x =
                                         "<div id='{$item['IppinKey']}' class='draggable'>
                                         <div id='{$item['Category']}' class='gf'></div>
                                         <div class='sustainable'></div>
                                         <div class'name'><p>{$item['IppinName']}/ {$item['IppinPrice']}</p></div>
                                         </div>";   
                                         $trimed = trim($x);
                                         $index = $item['Category'];
                                         //echo $trimed;
                                         $array = [$index => $trimed];
                                        echo json_encode($array);  
                        }                              
        }else if(isset($_POST['ippin_term']) && $_POST['ippin_term'] == "i"){
                $param_term = $_POST['ippin_term'];
                $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category
                FROM Ippins WHERE IppinKey = '". $param_term ."'" ;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {                                           
                                // output data of each row
                                while($item = $result->fetch_assoc()) {
                                        $item =
                                         "<div id='{$item['IppinKey']} class='draggable ui-widget-content'>
                                         <div id='{$item['Category']}' class='gf'></div>
                                         <div class='sustainable'></div>
                                         <div class'name'><p>{$item['IppinName']}'>/ {$item['IppinPrice']}</p></div>
                                         </div>";   
                                         $trimed = trim($item);
                                         $index = "{$item['IppinKey']}";
                                         $array = [$item, $array];
                                        echo json_encode($array);
                                        //echo $trimed; 
                                        }
                        }
                //}
                
        }else{
                        echo "0 results (isset)";
        }                        
}
//Close database connection
mysqli_close($conn);
?>