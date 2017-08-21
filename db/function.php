<?php
require_once ('database.php') ; 


class Sushi{
        /*
        public $sushi_name;
        public $origin;
        public $sushi_key;
        public $sushi_price;
        public $sustainability;
        public $sashimi_price;
        */
        public function get_sushi_item($sushi_key=0){
                global $db;
                $sql = "SELECT Sustainability, SushiName, Origin, SushiPrice, SashimiPrice, SushiKey 
                FROM Sushi WHERE SushiKey = '". $sushi_key ."'" ;
                $result_set = $db->query($sql);
                return $result_set;
                //$found = $db->fetch_assoc($result_set);
                //return $found;
        }

        public function get_sushi_items($i=0){
                global $db;
                $sql = "SELECT Sustainability, SushiName, Origin, SushiPrice, SashimiPrice, SushiKey 
                FROM Sushi WHERE SushiKey = '". $i ."'" ;
                $result_set = $db->query($sql);
                return $result_set;
                //$found = $db->fetch_assoc($result_set);
                //return $found;
        }

        public function add_class_to_origin($Name, $Origin){
                $NameLength = strlen($Name);
                $OriginLength = strlen($Origin);
                $className;
                if($NameLength + $OriginLength >= 38){ 
                        return $className = "origin_small";
                }else{
                        return $className = "origin";
                }
        }
/*
        public static function instantiate($item){
                $object = new self;
                $object->sushi_name     = $item['SushiName'];
                $object->origin         = $item['Origin'];
                $object->sushi_key      = $item['SushiKey'];
                $object->sushi_price    = $item['SushiPrice'];
                $object->sustainability = $item['Sustainability'];
                $object->sashimi_price  = $item['SashimiPrice'];
                return $object;
        }
*/
        public function create_table_row($item){
                $trimed = "<td class='sustainable'></td>
                <td class='name'>{$item['SushiName']}</td>
                <td class='" . $this->add_class_to_origin($item['SushiName'], $item['Origin']) . "'> {$item['Origin']}</td>
                <td class='price'id='{$item['SushiKey']}'>{$item['SushiPrice']}</td>
                <td class='space'></td>
                <td class='price'id='{$item['Sustainability']}'>{$item['SashimiPrice']}</td>";
                return $trimed;
        }

}//end of Sushi class


class Ippin{

    public function get_ippin_item($ippin_key=0){
        global $db;
        $sql = "SELECT IppinKey, GF, Sustainability, IppinName, IppinPrice, Category
        FROM Ippins WHERE IppinKey = '". $ippin_key ."'" ;
        $result_set = $db->query($sql);
        return $result_set;
        }


    public function create_item_list($item){
        $array = [];
        $sustainability = $item['Sustainability'];
        $gf = $item['GF'];
        $index = $item['Category'];
        $string1 = "<li id='{$item['IppinKey']}' class='sortable'>";
        $string2 = "<div id='ippin_menu'>{$item['IppinName']} / {$item['IppinPrice']}</div></li>";   

        if($sustainability == 1 && $gf == 1)
        {                 
            $trimed =
                $string1 
                . "<div id='gf'>GF <img src='../images/fish.jpg' id='fish' style='width:15px;'></div>" 
                . $string2;         
        
        }else if($sustainability == 1 && $gf == 0)
        {          
            $trimed =
                $string1 
                . "<div id='gf'><img src='../images/fish.jpg' id='fish' style='width:15px;'></div>"
                . $string2; 

        }else if($sustainability == 0 && $gf == 1)
        {                         
            $trimed =
                $string1
                . "<div id='gf'>GF</div>"
                . $string2;

        }else
        {            
            $trimed =
                $string1
                . "<div id='gf'></div>"
                . $string2;
        } 

         return $array = [$index => $trimed];

    }
}//endo of Ippin class


class Rolls{
    public function get_roll_item($roll_key=0){
        global $db;
        //$sql = "SELECT Raw, Sustainability, RollName, Category, RollPrice, Description, RollKey 
        $sql = "SELECT *
        FROM Rolls WHERE RollKey = '". $roll_key ."'" ;
        $result_set = $db->query($sql);
        return $result_set;
        }
    public function create_item_list($item){
        $array = [];
        $sustainability = $item['Sustainability'];
        $raw = $item['Raw'];
        $index = $item['Category'];
        $string1 = "<li id='{$item['RollKey']}' class='sortable'>";
        $string2 = "<div id='roll_description'>{$item['Description']}</div></li>"; 
        
        if($sustainability == 1 && $raw == 1)
        {                 
            $trimed =
                $string1
                . "<div id='gf'><img src='../images/fish.jpg' id='fish' style='width:15px;'></div>
                <div id='ippin_menu'>{$item['RollName']}*/ {$item['RollPrice']}</div>"
                . $string2;   
        }        
        else if($sustainability == 1 && $raw == 0)
        {          
            $trimed =
                $string1
                . "<div id='gf'><img src='../images/fish.jpg' id='fish' style='width:15px;'></div>
                <div id='ippin_menu'>{$item['RollName']}/ {$item['RollPrice']}</div>"
                . $string2;
                
                

        }else if($sustainability == 0 && $raw == 1)
        {                         
            $trimed =
                $string1
                . "<div id='ippin_menu' data-name='no_sustainable'>{$item['RollName']}/ {$item['RollPrice']}</div>"
                . $string2;
                
        }else
        {            
            $trimed =
                $string1
                . "<div id='ippin_menu' data-name='no_sustainable'>{$item['RollName']}/ {$item['RollPrice']}</div>"
                . $string2;
                
                            
        } 
        return $array = [$index => $trimed];
        }
}

class AddNewItem{
    public $sustainability = false;
    public $name = '';

    public function check_sustainability($sust_check_box){
        if(isset($sust_check_box)){       
            $this->sustainability = true;
        }
        else{
            $this->sustainability=false;
        }
    }

    public function format_name($user_input){
        global $db;
        $this->name = ucfirst($db->escape_value($user_input));   
    }

}
//$ippins = new Ippin;
// $rolls = new Rolls();
// var_dump($ippins->get_ippin_item(1));
// var_dump ($rolls->get_roll_item(1));
?>