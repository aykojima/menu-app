</div>
<?php echo"<script src='../js/" . $file . ".js'></script>";?>
<?php 
    if(THIS_PAGE == "sushi.php" || THIS_PAGE == "ippin.php"){
        echo"<script src='../js/dates.js'></script>";
        echo"<script src='../js/edit_" . $file . ".js'></script>";
        echo"<script src='../js/add_" . $file . ".js'></script>";
        }?>
</body>
</html>