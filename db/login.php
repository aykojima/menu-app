<?php
    require_once("../db/database.php");
    require_once("../db/function.php");
    require_once("../db/user.php");
    require_once("../db/session.php");

if(isset($_POST['submit'])){//form has been submitted
echo "form has been submitted";   
}

// if($session->is_logged_in()){
//        //redirect_to("index.php");
//        $message = "is logged in";
//    }


// if(isset($_POST['submit'])){//form has been submitted
//     $username = trim($_POST['username']);
//     $password = trim($_POST['password']);
//     $message = "form has been submitted";

    
//     //check db to see if usename/password extist.
//     $found_user = $user->authenticate($username, $password);

//     if($found_user){
//         $session->login($found_user);
//         //redirect_to("index.php");
//     }else {
//         //username/password combo wasn't found in the db.
//         $message = "username/password combination incorrect.";
//     }
// }else{//form has not been submitted.
//     $username = "" ;
//     $password = "" ;
// }
   
?>

