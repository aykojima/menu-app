<?php include('includes/header.php'); ?>
    <!--@to do
     @Style
    -->
<div id="add_form">
<form action="db/add.php" method="post">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo htmlentities($name); ?>">

        <input type="text" name="origin" id="origin" placeholder="Origin" value="<?php echo htmlentities($origin); ?>">

        <input type="text" name="sushi_price" id="sushiPrice" placeholder="Sushi Price" onkeyup="calcSashimi()" value="<?php echo htmlentities($sushi_price); ?>">

        <input type="text" name="sashimi_price" id="sashimiPrice" placeholder="Sashimi Price" value="<?php echo htmlentities($sashimi_price); ?>">
        <div id= "sustainable">
        <label for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        </div>
    <input type="submit" value="Save">
</form>
</div>
<?php include('includes/footer.php'); ?>