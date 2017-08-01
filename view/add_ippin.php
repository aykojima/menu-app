<?php include('../includes/header.php'); ?>
    <!--@to do
     @Style
    -->
<div id="add_form">
<form action="../db/add_ippin.php" method="post">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo htmlentities($name); ?>">

        <input type="text" name="price" id="price" placeholder="Price" value="<?php echo htmlentities($price); ?>">

        <select name="category" id="category" placeholder="category">
            <option value="appetizer">appetizer</option>
            <option value="tempura">tempura</option>
            <option value="fish_dish">fish dish</option>
            <option value="meat_dish">meat dish</option>
        </select>
        <br><br>
        <div id= "sustainable_gf">
        <label class='ippin' for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        <label class='ippin' for=gf>Gluten Free:</label>
        <input type="checkbox" name="gf" id="gf">
        </div>
    <input type="submit" value="Save">
</form>

</div>
</body>
</html>