<?php include('../includes/header.php'); ?>
    <!--@to do
     @Style
    -->
<div id="add_form">
<form action="../db/add_rolls.php" method="post">
        <input type="text" name="name" id="name" placeholder="Name (e.g. Black Cod, Avocado and Cucumber Roll)" value="<?php echo htmlentities($name); ?>">

        <textarea name="description" id="description" 
        placeholder="Description (e.g. Grilled Neah Bay black cod, avocado and cucumber)" 
        value="<?php echo htmlentities($description); ?>"></textarea>

        <input type="text" name="price" id="price" placeholder="Price (e.g. 12)" value="<?php echo htmlentities($price); ?>">
        <select name="category" id="category" placeholder="category">
            <option value="special_rolls">spcial rolls</option>
            <option value="rolls">rolls</option>
            <option value="vegetable_rolls">vegetable rolls</option>
        </select>
        <br><br>
        <div id= "sustainable_gf">
        <label class='ippin' for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        <label class='ippin' for=raw>Raw:</label>
        <input type="checkbox" name="raw" id="raw">
        </div>
    <input type="submit" value="Save">
</form>
</div>
<?php include('../includes/footer.php'); ?>