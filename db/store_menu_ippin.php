<?php 
require_once ('function.php') ; 

$AllMenu = new AllMenu;
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
        
        
}else{
        $obj = array();
        //$i = $_GET['get_menu'];
        for($i = 1001; $i <1005; $i++){
        $array = unserialize($AllMenu->get_stored_menu($i));
        array_push($obj, $array);
        }

        // foreach($array as $item){
        //         echo $item;
        // }
        //echo json_encode($string_data);//$array = unserialize($string_data);
        //echo gettype($array);
        echo json_encode($obj);
        //echo 'this is else statement';
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