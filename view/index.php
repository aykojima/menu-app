<!-- <?php include ("config.php");?> -->
<?php require_once("../db/database.php"); ?>
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

</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    
    <img src='../images/logo2.png' alt="tamura logo">
    <div class="form">
        <form id = "login" action = "" method = "post">
            <input type = "text" name = "username" placeholder = "Username"/><br /><br />
            <input type = "password" name = "password" placeholder = "Password"/><br/><br />
            <input type = "submit" value = " Login "/><br />
        </form>
    </div>




</body>
</html>