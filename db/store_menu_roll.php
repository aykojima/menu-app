<?php 
require_once ('function.php') ; 

$AllMenu = new AllMenu;
$key = 1005;
if(isset($_POST['term'])){
        $arrays = json_decode($_POST['term']);
  
        foreach($arrays as $array){
                $string_menu = serialize($array);
                //echo '$string_menu: ' . $string_menu;
                //echo $key; 
                $AllMenu->update_menu($string_menu, $key);
                $key++;
                //echo json_encode($array);                             
        }
        //echo "data has passed";
}else{
        $obj = array();
        //$i = $_GET['get_menu'];
        for($i = 1005; $i <1008; $i++){
                $array = unserialize($AllMenu->get_stored_menu($i));
                array_push($obj, $array);
        }
        echo json_encode($obj);

}

                     
//Close database connection
$db->close_connection();


?>