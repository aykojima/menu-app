<?php 
require_once ('database.php') ; 
require_once ('function.php') ; 

class AddIppinItem extends AddNewItem{
    public $sustainability = false;
    public $gf = false;
    public $name = '';
    public $category= 'appetizer';
    public $price = '';

    function __construct(){
        $this->check_sustainability($_POST['sustainability']);
        $this->check_gf($_POST['gf']);
        $this->format_name($_REQUEST['name']);
        $this->set_price($_REQUEST['price']);
        $this->set_category($_REQUEST['category']);
        $this->insert_sushi_item($this->gf, $this->sustainability, $this->name, $this->price,
                                 $this->category);
        
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

    public function insert_sushi_item($gf, $sustainability, $name, $price, $category){
            global $db;
            // attempt insert query execution
            $sql = "INSERT INTO Ippins (GF, Sustainability, IppinName, IppinPrice, Category) 
                    VALUES ('$gf', '$sustainability','$name', '$price', '$category')";
            if($db->query($sql)){
                echo "<script type='text/javascript'>window.alert('" . $name . " was added successfully');
                window.location.href = '../add_ippin.php';</script>"; 
            exit;
            } else{
                echo "<script type='text/javascript'>window.alert('ERROR: Could not able to add " . $name . "');
                window.location.href = '../add_ippin.php';</script>"; 
            }
    }
}
$add_new_ippin = new AddIppinItem;
//Close database connection
$db->close_connection();
?>