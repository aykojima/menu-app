<?php 
require_once ('database.php') ; 
require_once ('function.php') ; 

class EditIppinItem extends AddNewItem{
    public $ippin_key = 0;
    public $sustainability = false;
    public $gf = false;
    public $name = '';
    public $category= 'appetizer';
    public $price = '';

    function __construct(){
        $this->get_item($_POST['term_ippin']);
    }
    public function get_item($user_input){
        global $db;
        if(isset($user_input)){
                $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category 
                        FROM Ippins WHERE IppinKey = '". $user_input ."'" ;
                $result = $db->query($sql);
                if ($db->num_rows($result) > 0) {                 
                    $items = array();          
                    while($item = $db->fetch_assoc($result)) {
                        $items [] = $item;
                    }
                        echo json_encode($items);                                
                    }else{
                        echo "0 results (isset)";
                    }                        
        }else{
            $this->get_ippin_key($_REQUEST['ippin_key']);
            $this->check_sustainability($_POST['sustainability']);
            $this->check_gf($_POST['gf']);
            $this->format_name($_REQUEST['name']);
            $this->set_price($_REQUEST['price']);
            $this->set_category($_REQUEST['category']);
            $this->insert_sushi_item($this->gf, $this->sustainability, $this->name, $this->price,
                                    $this->category, $this->ippin_key);
        }
    }//end of get_item function

    public function get_ippin_key($user_input){
        $this->ippin_key = (int)$user_input;
    }

     public function check_gf($user_input){
        if(isset($user_input)){
            $this->gf = true;
        }
        else{
            $this->gf=false;
        }
    }

    public function set_price($user_input){
        global $db;
        $this->price = strtoupper($db->escape_value($user_input));
    }

    public function set_category($user_input){
        global $db;
        $this->category = $user_input;
    }
 
    public function insert_sushi_item($gf, $sustainability, $name, $price, $category, $ippin_key){
        global $db;
        // attempt insert query execution
        $sql = "UPDATE Ippins SET GF = '$gf', Sustainability = '$sustainability', IppinName = '$name', 
        IppinPrice = '$price', Category = '$category' WHERE IppinKey = '$ippin_key'"; 

        if($db->query($sql)){
            echo $ippin_key . "-" . $category;
            //"<script type='text/javascript'>window.alert('" . $name . " was edited successfully');
            //window.location.href = '../view/edit_ippin.php';</script>"; 
            //exit;
        } else{
            echo "<script type='text/javascript'>window.alert('ERROR: Could not able to edit " . $name . "');
            window.location.href = '../view/add_ippin.php';</script>"; 
        }
    }
}//end of class

$edit_ippin_item = new EditIppinItem;
//Close database connection
$db->close_connection();
?>




