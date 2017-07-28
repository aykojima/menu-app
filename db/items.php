<?php 

require_once ('function.php') ; 
$Sushi = new Sushi;
$Ippin = new Ippin;
$Rolls = new Rolls;

/***********Sushi**********/
if(isset($_POST['term'])){
        $sushi_key = $_POST['term'];
        $result = $Sushi->get_sushi_item($sushi_key);
        if ($db->num_rows($result) > 0) {                   
                // output data of each row
                while($item = $db->fetch_assoc($result)) {
                $trimed = $Sushi->create_table_row($item);
                //$trimed = trim($item);
                echo $trimed;  
                }              
        }                
}else if(isset($_POST['term']) && $_POST['term'] == "i"){
        $sushi_key = $_POST['term'];
        $result = $Sushi->get_sushi_items($sushi_key);
        if ($db->num_rows($result) > 0) {                   
                // output data of each row
                while($item = $db->fetch_assoc($result)) {
                $trimed = $Sushi->create_table_row($item);
                echo $trimed; 
                }
        }
        //}
        //echo json_encode($items);
}                    

/***********Ippins**********/
else if(isset($_POST['term_ippin'])){
        $ippin_key = $_POST['term_ippin'];
        $result = $Ippin->get_ippin_item($ippin_key);
        if ($db->num_rows($result) > 0) {                   
                // output data of each row
                while($item = $db->fetch_assoc($result)) {
                        $array = $Ippin->create_item_list($item);
                        //var_dump($array);
                        echo json_encode($array); 
                 }        
        }

}else if(isset($_POST['term_ippin']) && $_POST['term_ippin'] == "i"){
        $ippin_key = $_POST['term_ippin'];
        $result = $Ippin->get_ippin_item($ippin_key);

        if ($db->num_rows($result) > 0) {                   
                // output data of each row
                while($item = $db->fetch_assoc($result)) {
                        $array = $Ippin->create_item_list($item);
                        echo json_encode($array); 
                 }        
        }
}

/***********Rolls**********/
else if(isset($_POST['term_rolls'])){
        $roll_key = $_POST['term_rolls'];
        $result = $Rolls->get_roll_item($roll_key);
        $array = [];
        if ($db->num_rows($result) > 0) {                  
                // output data of each row
                while($item = $db->fetch_assoc($result)) {
                        $array = $Rolls->create_item_list($item);
                        echo json_encode($array); 
                }
        }
                                 
}else if(isset($_POST['term_rolls']) && $_POST['term_rolls'] == "i"){
        $roll_key = $_POST['term_rolls'];
        $result = $Rolls->get_roll_item($roll_key);
        $array = [];
        if ($db->num_rows($result) > 0) {                  
                // output data of each row
                while($item = $db->fetch_assoc($result)) {
                        $array = $Rolls->create_item_list($item);
                        echo json_encode($array); 
                }
        }
}else{
        echo "0 results (isset)";
}                        
//Close database connection
$db->close_connection();
?>