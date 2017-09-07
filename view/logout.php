<?php 

require_once("../db/session.php");
require_once("../db/function.php");


$session->logout();
redirect_to("login.php");

?>