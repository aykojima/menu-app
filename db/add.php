<?php 
require_once ('database.php') ; 
require_once ('function.php') ; 
class AddSushiItem extends AddNewItem{

    public $sustainability = false;
    public $name = '';
    public $origin= '';
    public $sushiPrice = 0;
    public $sashimiPrice = 0;

    function __construct(){
        $this->check_sustainability($_POST['sustainability']);
        $this->format_name($_REQUEST['name']);
        $this->format_origin($_REQUEST['origin']);
        $this->set_prices($_REQUEST['sushi_price'], $_REQUEST['sashimi_price']);
        $this->insert_sushi_item($this->sustainability, $this->name, $this->origin, 
        $this->sushiPrice, $this->sashimiPrice);
        
    }

    public function format_origin($user_input){
        global $db;
        $this->origin = $db->escape_value($user_input);
        $this->origin = '(' . ucfirst($this->origin) . ')';
        //$origin = '(' . ucfirst($origin) . ')';
        //return $origin;
    }

    public function set_prices($sushi_price, $sashimi_price){
        $this->sushiPrice = (float)$sushi_price;
        $this->sashimiPrice = (float)$sashimi_price;
    }
 
    public function insert_sushi_item($sustainability, $name, $origin, $sushiPrice, $sashimiPrice){
        global $db;
        // attempt insert query execution
        $sql = "INSERT INTO Sushi (Sustainability, SushiName, Origin, SushiPrice, SashimiPrice) 
                VALUES ('$sustainability', '$name', '$origin', '$sushiPrice', '$sashimiPrice')";
        if($db->query($sql)){
            echo "<script type='text/javascript'>window.alert('" . $name . " was added successfully');
            window.location.href = '../add_sushi.php';</script>"; 
        exit;
        } else{
            echo "<script type='text/javascript'>window.alert('ERROR: Could not able to add " . $name . "');
            window.location.href = '../add_sushi.php';</script>"; 
        }   
    }
}
$add_sushi_item = new AddSushiItem;
//Close database connection
$db->close_connection();
?>