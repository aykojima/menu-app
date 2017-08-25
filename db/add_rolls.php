<?php 
require_once ('database.php') ; 
require_once ('function.php') ; 

class AddRollItem extends AddNewItem{
    public $sustainability = false;
    public $raw = false;
    public $name = '';
    public $description = '';
    public $category= 'special_rolls';
    public $price = '';

    function __construct(){
        $this->check_sustainability($_POST['sustainability']);
        $this->check_raw($_POST['raw']);
        $this->format_name($_POST['name']);
        $this->set_description($_POST['description']);
        $this->set_price($_POST['price']);
        $this->set_category($_POST['category']);
        $this->insert_sushi_item($this->raw, $this->sustainability, $this->name, $this->price,
                                 $this->description, $this->category);
        
    }

    public function check_raw($user_input){
        if(isset($user_input)){
            $this->raw = true;
        }
        else{
            $this->raw=false;
        }
    }    

    public function set_description($user_input){
        global $db;
        $this->description = ucfirst($db->escape_value($user_input)); 
    }
    
    public function set_price($user_input){
        global $db;
        $this->price = strtoupper($db->escape_value($user_input));
    }

    public function set_category($user_input){
        global $db;
        $this->category = $user_input;
    }

    public function insert_sushi_item($raw, $sustainability, $name, $price, $description, $category){
            global $db;
            // attempt insert query execution
            $sql = "INSERT INTO Rolls (Raw, Sustainability, RollName, RollPrice, Description, Category) 
                    VALUES ('$raw', '$sustainability','$name', '$price', '$description', '$category')";
            if($db->query($sql)){
                echo "<script type='text/javascript'>window.alert('" . $name . " was added successfully');
                window.location.href = '../view/add_rolls.php';</script>"; 
            exit;
            } else{
                echo "<script type='text/javascript'>window.alert('ERROR: Could not able to add " . $name . "');
                window.location.href = '../view/add_rolls.php';</script>"; 
            }
    }
}
$add_new_roll = new AddRollItem;
//Close database connection
$db->close_connection();
?>