<?php include('includes/header.php'); ?>
    <!--@to do
     @auto select category when select item to edit
     @Style
    -->

<div class="search-box">
        <input id="search"type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
</div>


<div id="add_form">
<form action="db/edit_ippin.php" method="post">
        <input type="text" name="ippin_key" id="ippin_key" placeholder="Ippin Key">
        <input type="text" name="name" id="name" placeholder="Name">

        <input type="text" name="price" id="price" placeholder="Price">

        <select name="category" id="category" placeholder="category">
            <option id='1' value="appetizer">appetizer</option>
            <option id='2' value="tempura">tempura</option>
            <option id='3' value="fish_dish">fish dish</option>
            <option id='4' value="meat_dish">meat dish</option>
        </select>
        <br><br>
        <div id= "sustainable_gf">
        <label class='ippin' for=sustainability>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        <label class='ippin' for=gf>Gluten Free:</label>
        <input type="checkbox" name="gf" id="gf">
        </div>
    <input type="submit" value="Save">
</form>
</div>
<script src='js/edit_ippin.js'></script>
</body>
</html>