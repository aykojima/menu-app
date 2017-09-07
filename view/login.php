<?php
    require_once("../db/database.php");
    require_once("../db/function.php");
    require_once("../db/user.php");
    require_once("../db/session.php");


if($session->is_logged_in()){
       redirect_to("sushi.php");
       
   }


if(isset($_POST['submit'])){//form has been submitted
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    
    //check db to see if usename/password extist.
    $found_user = $user->authenticate($username, $password);
    //$message = var_dump($found_user);
    if($found_user){
        $session->login($found_user);
        //$message = $_SESSION['user_id'];
        redirect_to("sushi.php");
    }else {
        //username/password combo wasn't found in the db.
        $message = "username/password combination incorrect.";
        
    }
}else{//form has not been submitted.
    $username = "" ;
    $password = "" ;
}
   
?>

<!DOCTYPE html>
<html>
<head>
<title>SKT Menu</title>
<!-- <link rel="stylesheet" href="../css/style-screen.css" type="text/css" media="screen">
<link rel="stylesheet" href="../css/style-print.css" type="text/css" media="print"> -->

<style>
    @font-face {
        font-family: 'TheSansSemiBoldPlain'; 
        src: url('http://ayumik.com/menu-app/css/TheSansSemiBoldPlain.ttf');    
    }   

    body{
        /* background-color: #CF671F; */
        font-family: TheSansSemiBoldPlain;
        font-weight: lighter;
    }
    
    img{
        display: block;
        margin: auto;
        margin-top: 10%;
    }

    div.form{
        display: block;
        text-align: center;
        margin: 5%;
    }
    input[type=text], input[type=password] {
        width: 400px;
        padding: 1%;
        font-size: 1.2em;
    }
    input[type="submit"] {
        width: 200px;
        font-size: 1.2em;
        background-color: #CF671F;
        color: #f5deb3;
    }

    input[type="submit"]:hover {
        background-color: #ef6507;
    }

    #footer{
        text-align: center;
    }

</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    
    <img src='../images/logo2.png' alt="tamura logo">
    <div class="form">
         <?php echo "<p style='color:red'>" . $message . "</p>"; ?> 
        <form id = "login" action = "login.php" method = "post">
            <input type = "text" name = "username" placeholder = "Username" 
              value= "<?php echo htmlentities($UserName); ?>"  />
             <br /><br />
            <input type = "password" name = "password" placeholder = "Password"/><br/><br />
            <input type = "submit" name = "submit" value = " Login "/><br />
        </form>
    </div>



<div id="footer" style='color:#ccc; font-size:.8em;'>Copyright<?php echo date("Y", time()); ?>, Sushi Kappo Tamura</div>
</body>
</html>
<?php if(isset($db)){$db->close_connection(); }?>