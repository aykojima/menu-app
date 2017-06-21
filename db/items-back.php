<?php 
Class Database{
        public function __construct(){
        }
        //static $conn;
        
        public function db(){    
                $servername = "mysql.ayumik.com";
                $username = "ayumik";
                $password = "9br68i4Y08";
                $dbname = "ayumik";

                $conn = mysqli_connect($servername, $username, $password, $dbname);  
                        // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } 
                //echo "Connected";
                $sushiKey =array(1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17,
                                18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 29, 30, 31, 32, 33, 34, 35 
                                );
                $items = array();
        foreach($sushiKey as $key){
                $sql = "SELECT SushiKey, Sustainability, SushiName, Origin, SushiPrice, SashimiPrice FROM Sushi WHERE SushiKey =" . $key . " " ;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {                      
                        // output data of each row
                        while($item = $result->fetch_assoc()) {
                                //echo
                        $item = 
                                "<tr><td class='sustainable'></td>
                                <td class='name'>{$item['SushiName']}{$item['Origin']}{$item['Sustainability']}</td>
                                <td class='price'>{$item['SushiPrice']}</td>
                                <td class='price'>{$item['SashimiPrice']}</td></tr>\n";
                                $trimed = trim($item);
                                array_push($items, $trimed);
                        //echo "SushiKey: " . $item["SushiKey"]. " SushiName: " . $item["SushiName"]. "Origin: " . $item["Origin"]. 
                        //"SushiPrice: " . $item["SushiPrice"]. "SashimiPrice: " . $item["SashimiPrice"]. "<br>";
                         //mysqli_close($conn);
                         }
                }else{
                        echo "0 results";
                }
        }
        
        echo json_encode($items);
        }
        
        }


//session




