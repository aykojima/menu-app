<?php 
require_once ('database.php') ; 
require_once ('function.php') ; 


if(isset($_REQUEST['search']) && ($_REQUEST['search'])=='all'){
    // Prepare a select statement
    $sql = "SELECT * FROM Sushi";
    $result = $db->query($sql);
                if ($db->num_rows($result) > 0) {
                    //echo $db->num_rows($result);         
                    //$items = array();          
                        while($item = $db->fetch_assoc($result)) {
                            echo "<button id='" . $item["SushiKey"] .  "-editkey' class='edit' onclick='show_edit_div()'> edit</button>
                            <p id='" . $item["SushiKey"] .  "-searchkey'>" . $item["SushiName"] . " " .$item["Origin"] . "</p> ";                            
                        }                                                     
                }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
                }
}else if(isset($_REQUEST['search'])){
    $sql = "SELECT * FROM Sushi WHERE SushiName LIKE ?";
    $param_term = '%' . $_REQUEST['search'] . '%';
    if($stmt = $db->prepare($sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);       
            //$result = $db->query($sql);
            // Check number of rows in the result set
            if ($db->num_rows($result) > 0) {
                // Fetch result rows as an associative array
                 while($item = $db->fetch_assoc($result)) {
                    echo "<button id='" . $item["SushiKey"] .  "-editkey' class='edit' onclick='show_edit_div()'> edit</button>
                    <p id='" . $item["SushiKey"] .  "-searchkey'>" . $item["SushiName"] . " " .$item["Origin"] . "</p> ";
                }
            }else if(isset($_REQUEST['search']) && $_REQUEST['search'] == '+'){
                echo "<p id='addall'>add sample 30 items to the menu</p>";
            }else if(isset($_REQUEST['search']) && $_REQUEST['search'] == '-'){
                echo "<p id='empty'>empty the menu</p>";
            }else{
                echo "<p id='nomatch'>No matches found. <a href='http://ayumik.com/skt/view/add_sushi.php' target='_blank''>Add New Item</a></p>";
            }
        }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
        }
    }
}else if(isset($_REQUEST['search_ippin']) && ($_REQUEST['search_ippin'])=='all'){
    // Prepare a select statement
    $sql = "SELECT * FROM Ippins";
    $result = $db->query($sql);
                if ($db->num_rows($result) > 0) {
                    //echo $db->num_rows($result);         
                    //$items = array();          
                        while($item = $db->fetch_assoc($result)) {
                            echo "<button id='" . $item["IppinKey"] .  "-editkey' class='edit' onclick='show_edit_div()'> edit</button>
                            <p id='" . $item["IppinKey"] .  "-searchkey' class='" . $item["Category"] .  "'>" . $item["IppinName"] . "/ " .$item["IppinPrice"] . "</p>";
                        }                             
                }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
                }
}else if(isset($_REQUEST['search_ippin'])){
    // Prepare a select statement
    $sql = "SELECT * FROM Ippins WHERE IppinName LIKE ?";
    $param_term = '%' . $_REQUEST['search_ippin'] . '%';
    if($stmt = $db->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if ($db->num_rows($result) > 0) {
                // Fetch result rows as an associative array
                 while($item = $db->fetch_assoc($result)) {
                    echo "<button id='" . $item["IppinKey"] .  "-editkey' class='edit' onclick='show_edit_div()'> edit</button>
                            <p id='" . $item["IppinKey"] .  "-searchkey' class='" . $item["Category"] .  "'>" . $item["IppinName"] . "/ " .$item["IppinPrice"] . "</p>";
                }
            }else if(isset($_REQUEST['search_ippin']) && $_REQUEST['search_ippin'] == '+'){
                echo "<p id='addall'>add sample 30 items to the menu</p>";
            }else if(isset($_REQUEST['search_ippin']) && $_REQUEST['search_ippin'] == '-'){
                echo "<p id='empty'>empty the menu</p>";
            }else{
                echo "<p id='nomatch'>No matches found. <a href='http://ayumik.com/skt/view/add_ippin.php' target='_blank''>Add New Item</a></p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
        }
    }
}else if(isset($_REQUEST['search_roll']) && ($_REQUEST['search_roll'])=='all'){
    // Prepare a select statement
    $sql = "SELECT * FROM Rolls";
    $result = $db->query($sql);
                if ($db->num_rows($result) > 0) {
                    //echo $db->num_rows($result);         
                    //$items = array();          
                        while($item = $db->fetch_assoc($result)) {
                            echo "<button id='" . $item["RollKey"] .  "-editkey' class='edit' onclick='show_edit_div()'> edit</button>
                            <p id='" . $item["RollKey"] .  "-searchkey' class='" . $item["Category"] .  "'>" . $item["RollName"] . "/ " .$item["RollPrice"] . "</p>";
                        }                             
                }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
                }
}else if(isset($_REQUEST['search_roll']) && $_REQUEST['search_roll'] == '+'){
    echo "<p id='addall'>add sample items to the menu</p>";
}else if(isset($_REQUEST['search_roll']) && $_REQUEST['search_roll'] == '-'){
    echo "<p id='empty'>empty the menu</p>";
}else if(isset($_REQUEST['search_roll'])){
    // Prepare a select statement
    $sql = "SELECT * FROM Rolls WHERE RollName LIKE ?";
    $param_term = '%' . $_REQUEST['search_roll'] . '%';
    if($stmt = $db->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if ($db->num_rows($result) > 0) {
                // Fetch result rows as an associative array
                 while($item = $db->fetch_assoc($result)) {
                    echo "<button id='" . $item["RollKey"] .  "-editkey' class='edit' onclick='show_edit_div()'> edit</button>
                    <p id='" . $item["RollKey"] .  "-searchkey' class='" . $item["Category"] .  "'>" . $item["RollName"] . "/ " .$item["RollPrice"] . "</p>";
                }           
            }else{
                echo "<p id='nomatch'>No matches found. <a href='http://ayumik.com/skt/view/add_rolls.php' target='_blank''>Add New Item</a></p>";
            }
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db->conn);
        }
    }
}
    // Close statement
    $db->close_connection();









?>