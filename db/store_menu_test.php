<?php 
require_once ('function.php') ; 

$AllMenu = new AllMenu;

        $array = array(1, 2, 3, 4, 5);
        $string_menu = serialize($array);
        $AllMenu->update_menu($string_menu, 1000);
        echo 'passed!';


// }else{
//         $menu_name = $_POST['term'];
//         //$menu_name = '1000';
//         $string_data = $AllMenu->get_stored_menu($menu_name);
//         echo $string_data;
//         //echo json_encode($string_data);//$array = unserialize($string_data);
//         //echo json_encode($data);
// }


$db->close_connection();


?>