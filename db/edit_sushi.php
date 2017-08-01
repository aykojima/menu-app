<?php 
require_once ('database.php') ; 
require_once ('function.php') ; 

class EditSushiItem extends AddNewItem{
    public $sushiKey = 0;
    public $sustainability = false;
    public $name = '';
    public $origin= '';
    public $sushiPrice = 0;
    public $sashimiPrice = 0;
    
    function __construct(){
        $this->get_item($_POST['term']);
        
    }
    public function get_item($user_input){
        global $db;
        if(isset($user_input)){
            $sql = "SELECT SushiKey, Sustainability, SushiName, Origin, SushiPrice, SashimiPrice 
                    FROM Sushi WHERE SushiKey = '". $user_input ."'" ;
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
            $this->get_sushi_key($_REQUEST['sushi_key']);
            $this->check_sustainability($_POST['sustainability']);
            $this->format_name($_REQUEST['name']);
            $this->format_origin($_REQUEST['origin']);
            $this->set_prices($_REQUEST['sushi_price'], $_REQUEST['sashimi_price']);
            $this->insert_sushi_item($this->sustainability, $this->name, $this->origin, 
            $this->sushiPrice, $this->sashimiPrice, $this->sushiKey);
        }
    }// end of get_item function


    public function get_sushi_key($user_input){
        $this->sushiKey = (int)$user_input;
    }

    public function format_origin($user_input){
        global $db;
        $this->origin = $db->escape_value($user_input);
        $this->origin = '(' . ucfirst($this->origin) . ')';
        
    }

    public function set_prices($sushi_price, $sashimi_price){
        $this->sushiPrice = (float)$sushi_price;
        $this->sashimiPrice = (float)$sashimi_price;
    }


    public function insert_sushi_item($sustainability, $name, $origin, $sushiPrice, $sashimiPrice, $sushiKey){
        global $db;
        // attempt insert query execution
        $sql = "UPDATE Sushi SET Sustainability = '$sustainability', SushiName = '$name', Origin = '$origin', 
                SushiPrice = '$sushiPrice', SashimiPrice = '$sashimiPrice' WHERE SushiKey = '$sushiKey'"; 

        if($db->query($sql)){
            echo "<script type='text/javascript'>window.alert('" . $name . " was edited successfully');
            window.location.href = '../view/edit_sushi.php';</script>"; 
            exit;
        } else{
            echo "<script type='text/javascript'>window.alert('ERROR: Could not able to edit " . $name . "');
            window.location.href = '../view/add_sushi.php';</script>"; 
        }
    }

}//end of class
$edit_sushi_item = new EditSushiItem;
//Close database connection
$db->close_connection();
?>




