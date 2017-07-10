<?php 
include ('../config/config.php') ; 
/***********Sushi**********/
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
/***********Ippins**********/
if(isset($_POST['term_ippin'])){
        $param_term = $_POST['term_ippin'];
        $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category
        FROM Ippins WHERE IppinKey = '". $param_term ."'" ;
        $result = $conn->query($sql);

        $array = [];
        if ($result->num_rows > 0) {                  
                // output data of each row
                while($item = $result->fetch_assoc()) { 
                        if($item['Sustainability'] == 1 && $item['GF'] == 1)
                        {                 
                         $x =
                                "<li id='{$item['IppinKey']}' class='sortable'>
                                <div id='gf'>GF <img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }        
                        else if($item['Sustainability'] == 1 && $item['GF'] == 0)
                        {          
                        $x =
                                "<li id='{$item['IppinKey']}' class='sortable'>
                                <div id='gf'><img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);     
                        }else if($item['Sustainability'] == 0 && $item['GF'] == 1)
                         {                         
                         $x =
                                "<li id='{$item['IppinKey']}' class='sortable'>
                                <div id='gf'>GF</div>
                                <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }else
                         {            
                         $x =
                                         "<li id='{$item['IppinKey']}' class='sortable'>
                                         <div id='gf'></div>
                                         <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                         $trimed = trim($x);
                                         $index = $item['Category'];
                                         //echo $trimed;
                                         //$array = [$index => $trimed];
                                         //echo json_encode($array);  
                        } 
                        $array = [$index => $trimed];
                        echo json_encode($array); 
                 }        
        }
}else if(isset($_POST['term_ippin']) && $_POST['term_ippin'] == "i"){
        $param_term = $_POST['term_ippin'];
        $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category
        FROM Ippins WHERE IppinKey = '". i ."'" ;
        $result = $conn->query($sql);

        //$array = [];
        if ($result->num_rows > 0) {                  
                // output data of each row
                while($item = $result->fetch_assoc()) { 
                        if($item['Sustainability'] == 1 && $item['GF'] == 1)
                        {                 
                         $x =
                                "<li id='{$item['IppinKey']}' class='sortable'>
                                <div id='gf'>GF <img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }        
                        else if($item['Sustainability'] == 1 && $item['GF'] == 0)
                        {          
                        $x =
                                "<li id='{$item['IppinKey']}' class='sortable'>
                                <div id='gf'><img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);     
                        }else if($item['Sustainability'] == 0 && $item['GF'] == 1)
                         {                         
                         $x =
                                "<li id='{$item['IppinKey']}' class='sortable'>
                                <div id='gf'>GF</div>
                                <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }else
                         {            
                         $x =
                                         "<li id='{$item['IppinKey']}' class='sortable'>
                                         <div id='gf'></div>
                                         <div id='ippin_menu'>{$item['IppinName']}/ {$item['IppinPrice']}</div></li>";   
                                         $trimed = trim($x);
                                         $index = $item['Category'];
                                         //echo $trimed;
                                         //$array = [$index => $trimed];
                                         //echo json_encode($array);  
                        } 
                        $array = [$index => $trimed];
                        echo json_encode($array); 
                        }
                }else{
                        echo "0 results (isset)";
        }                        
}


/***********Rolls**********/
if(isset($_POST['term_rolls'])){
        $param_term = $_POST['term_rolls'];
        $sql = "SELECT Raw, Sustainability, RollName, Category, RollPrice, Description, RollKey 
        FROM Rolls WHERE RollKey = '". $param_term ."'" ;
        $result = $conn->query($sql);
        $array = [];
        if ($result->num_rows > 0) {                  
                // output data of each row
                while($item = $result->fetch_assoc()) { 
                        if($item['Sustainability'] == 1 && $item['Raw'] == 1)
                        {                 
                         $x =
                                "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='gf'><img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['RollName']}*/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }        
                        else if($item['Sustainability'] == 1 && $item['Raw'] == 0)
                        {          
                        $x =
                                "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='gf'><img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['RollName']}/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);     
                        }else if($item['Sustainability'] == 0 && $item['Raw'] == 1)
                         {                         
                         $x =
                               "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='ippin_menu' data-name='no_sustainable'>{$item['RollName']}*/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }else
                         {            
                         $x =
                                "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='ippin_menu' data-name='no_sustainable'>{$item['RollName']}/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>"; 
                                         $trimed = trim($x);
                                         $index = $item['Category'];
                                         //echo $trimed;
                                         //$array = [$index => $trimed];
                                         //echo json_encode($array);  
                        } 
                        $array = [$index => $trimed];
                        echo json_encode($array); 
                        }
                }else{
                        echo "0 results (isset)";
        }                        
}else if(isset($_POST['term_rolls']) && $_POST['term_rolls'] == "i"){
        $param_term = $_POST['term_rolls'];
        $sql = "SELECT Raw, Sustainability, RollName, Category, RollPrice, Description, RollKey 
        FROM Rolls WHERE RollKey = '". i ."'" ;
        $result = $conn->query($sql);

       if ($result->num_rows > 0) {                  
                // output data of each row
                while($item = $result->fetch_assoc()) { 
                        if($item['Sustainability'] == 1 && $item['Raw'] == 1)
                        {                 
                         $x =
                                "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='gf'><img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['RollName']}*/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }        
                        else if($item['Sustainability'] == 1 && $item['Raw'] == 0)
                        {          
                        $x =
                                "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='gf'><img src='images/fish.jpg' id='fish' style='width:15px;'></div>
                                <div id='ippin_menu'>{$item['RollName']}/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);     
                        }else if($item['Sustainability'] == 0 && $item['Raw'] == 1)
                         {                         
                         $x =
                               "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='gf'></div>
                                <div id='ippin_menu'>{$item['RollName']}*/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>";   
                                $trimed = trim($x);
                                $index = $item['Category'];
                                //echo $trimed;
                                //$array = [$index => $trimed];
                                //echo json_encode($array);  
                        }else
                         {            
                         $x =
                                "<li id='{$item['RollKey']}' class='sortable'>
                                <div id='gf'></div>
                                <div id='ippin_menu'>{$item['RollName']}/ {$item['RollPrice']}</div>
                                <div id='roll_description'>{$item['Description']}</div></li>"; 
                                         $trimed = trim($x);
                                         $index = $item['Category'];
                                         //echo $trimed;
                                         //$array = [$index => $trimed];
                                         //echo json_encode($array);  
                        } 
                        $array = [$index => $trimed];
                        echo json_encode($array); 
                        }
                }else{
                        echo "0 results (isset)";
        }                        
}
//Close database connection
mysqli_close($conn);
?>