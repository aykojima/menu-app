<?php 
require_once ('function.php') ; 

$AllMenu = new AllMenu;

if(isset($_GET['term'])){
        $array = json_decode($_GET['term']);
        //var_dump($array);
        $string_menu = serialize($array);
        //echo $string_menu;
        $AllMenu->update_menu($string_menu, 1000);
        //echo json_encode($array);
}else{
        $array = unserialize($AllMenu->get_stored_menu(1000));
        // foreach($array as $item){
        //         echo $item;
        // }
        //echo json_encode($string_data);//$array = unserialize($string_data);
        //echo gettype($array);
        echo json_encode($array);
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