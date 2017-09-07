<?php
require_once('database.php');

class User{

public $UserId;
public $UserName;
public $Password;
public $FirstName;
public $LastName;
public $Email;

private function instantiate($record){
    $object = new User;
    // $object->id         = $record['id'];
    // $object->username   = $record['username'];
    // $object->password   = $record['password'];
    // $object->first_name = $record['first_name'];
    // $object->last_name  = $record['last_name'];
    // return $object;

    foreach($record as $attribute=>$value){
        if($object->has_attribute($attribute)){
            $object->$attribute = $value;
        }
    }
        return $object;
}

private function has_attribute($attribute){
    $object_vars = get_object_vars($this);
    return array_key_exists($attribute, $object_vars);
}

public function find_all(){
    global $db;
    $sql = "SELECT * FROM Users";
    return $this->find_by_sql($sql);
}

public function find_by_id($UserId=0){
    global $db;
    $sql = "SELECT * FROM Users WHERE UserId={$UserId} LIMIT 1";
    $result_array = $this->find_by_sql($sql);
    return !empty($reslut_array) ? array_shift($result_array) : false;
    
}

public function find_by_sql($sql = ""){
    global $db;
    $result_set = $db->query($sql);
    $object_array = array();
    while($row = $db->fetch_array($result_set)){
        $object_array[] = $this->instantiate($row);
    }
    return $object_array;
}

public function authenticate($UserName="", $Password=""){
    global $db;
    $UserName = $db->escape_value($UserName);
    $Password = $db->escape_value($Password);
    $sql = "SELECT * FROM Users WHERE UserName = '{$UserName}' LIMIT 1";
    $result_array = $this->find_by_sql($sql);

    $found_user = !empty($result_array) ? array_shift($result_array) : false;
    if($found_user){
        foreach($found_user as $row){
            if ($this->password_check($Password, $row)) {
                return $found_user;
            }
        }
        return false;
    }else {return $found_user;}
    

    // $sql = "SELECT * FROM Users ";
    // $sql .= "WHERE Username = '{$username}' ";
    // $sql .= "AND Password = '{$password}' ";
    // $sql .= "LIMIT 1";

    // $sql = "SELECT * FROM Users WHERE UserName = '{$UserName}' AND Password = '{$hashed_password}' LIMIT 1";
    
    // $result_array = $this->find_by_sql($sql);
    // // echo "<pre>";
    // // var_dump($result_array);
    // // echo "</pre>";

    // return !empty($result_array) ? array_shift($result_array) : false;
}

private function password_encrypt($password){
    //echo 'password: ' . $password;
    $hash_format ="$2y$10$";
    $salt_length = 22;
    $salt = $this->generate_salt($salt_length);
    //echo 'salt: ' . $salt;
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;

}

private function generate_salt($length){
    //MD5 returns 32 characters
    $unique_random_string =md5(uniqid(mt_rand(), true));
    //Valid characters for salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);
    //But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);
    //Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);
    return $salt;
}

private function password_check($password, $existing_hash){
    $hash = crypt($password, $existing_hash);
    if ($hash == $existing_hash)
    {return true; }else {return false; }

}
public function full_name(){
    if(isset($this->$FirstName) && isset($this->$LastName)){
        return $this->$FirstName . " " . $this->$LastName;
    }else{
        return "";
    }
}
}//end of User class

$user = new User();

// $user1 = $user->find_by_id(1);

// $users = $user->find_all();
// foreach($users as $user){
//     echo "User: " . $user['username'] . "</br>";
//     echo "Name: " . $user['first_name'] . " " . $user['last_name'] . "</br>";
// }

?>