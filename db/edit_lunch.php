<?php 

require_once ('database.php') ; 


function update($column, $editval, $id){
        global $db;
        $editval = trim($editval);
        if (strpos($editval, '\n') !== false){
            $editval = str_replace("\n", "", $db->escape_value($editval));
        }
        $editval = str_replace(",", "", $db->escape_value($editval));
        
        
        $sql = "UPDATE Lunch set " . $column . " = '". $editval ."' WHERE  LunchKey=".$id ; 
        if($db->query($sql)){
            echo $editval;
        }else{
            echo"failed";
        }

}

update($_POST["column"], $_POST["editval"], $_POST["id"]);





?>