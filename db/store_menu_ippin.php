<?php 
require_once ('function.php') ; 

$AllMenu = new AllMenu;
$Ippin = new Ippin;
$key = 1001;
if(isset($_POST['term'])){
        $arrays = json_decode($_POST['term']);
        //var_dump($arrays);
        
        
        foreach($arrays as $array){
                $string_menu = serialize($array);
                //echo $string_menu;
                //echo $key; 
                $AllMenu->update_menu($string_menu, $key);
                $key++;
                //echo json_encode($array);       
                        
        }
        
        
}else if(isset($_GET['keys'])){ 
        $result_array = array();        
        for($i = 1001; $i <1005; $i++){
                $array = unserialize($AllMenu->get_stored_menu($i));
                array_push($result_array, $array);
                //echo json_encode($array);  
        }
        
        echo json_encode($result_array);       

}else{
        //$return_array = array();
        $result_array = array();
        for($i = 1001; $i <1005; $i++){
                $array = unserialize($AllMenu->get_stored_menu($i));
                foreach($array as $ippin_key){
                        $result = $Ippin->get_ippin_item($ippin_key);
                        if($db->num_rows($result) > 0) {                   
                        // output data of each row
                                while($item = $db->fetch_assoc($result)) {
                                        $menu_array = $Ippin->create_item_list($item);
                                        //var_dump ($menu_array);
                                         //echo json_encode($menu_array); 
                                         array_push($result_array, $menu_array);
                                }             
                        }
                }
        }
        echo json_encode($result_array);  //returning numbers....
}
/*
else if(($_POST['updateSushi'])){
        $string_menu = $POST['updateSushi'];
        $AllMenu->update_menu($string_menu, 'Sushi');
        $string_data = $AllMenu->get_stored_menu($menu_name);
        $array = unserialize($string_data);
        echo json_encode($data);

}else{
        echo "no data";
} 
*/                       
//Close database connection
$db->close_connection();


?>