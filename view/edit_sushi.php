<?php include('../includes/header.php'); ?>
    <!--@to do
     @Style
    -->

<div class="search-box">
        <input id="search"type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
</div>


<div id="add_form">
<form action="../db/edit_sushi.php" method="post">
        <input type="text" name="sushi_key" id="sushi_key" placeholder="Sushi Key" value="<?php echo htmlentities($sushi_key); ?>">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo htmlentities($name); ?>">

        <input type="text" name="origin" id="origin" placeholder="Origin" value="<?php echo htmlentities($origin); ?>">

        <input type="text" name="sushi_price" id="sushiPrice" placeholder="Sushi Price" onkeyup="calcSashimi()">

        <input type="text" name="sashimi_price" id="sashimiPrice" placeholder="Sashimi Price">
        <div id= "sustainable">
        <label for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        </div>
    <input type="submit" value="Save">
</form>
<?php include('../includes/footer.php'); ?>