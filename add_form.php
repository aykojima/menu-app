<?php include('includes/header.php'); ?>
    <!--@to do
     @Style
     @auto fill Sashimi Price
    -->
<div id="add_form">
<form action="db/add.php" method="post">
        <input type="text" name="name" id="name" placeholder="Name">

        <input type="text" name="origin" id="origin" placeholder="Origin">

        <input type="text" name="sushi_price" id="sushiPrice" placeholder="Sushi Price">

        <input type="text" name="sashimi_price" id="sashimiPrice" placeholder="Sashimi Price">
        <div id= "sustainable">
        <label for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        </div>
    <input type="submit" value="Add">
</form>
</div>
</body>
</html>