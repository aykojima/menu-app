<?php include('includes/header.php'); ?>
    <!--@to do
     @Style
     @auto fill Sashimi Price
    -->

<div class="search-box">
        <input id="search"type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
</div>


<div id="add_form">
<form action="db/edit.php" method="post">
        <input type="text" name="sushi_key" id="sushi_key" placeholder="Sushi Key">
        <input type="text" name="name" id="name" placeholder="Name">

        <input type="text" name="origin" id="origin" placeholder="Origin">

        <input type="text" name="sushi_price" id="sushiPrice" placeholder="Sushi Price" onkeyup="calcSashimi()">

        <input type="text" name="sashimi_price" id="sashimiPrice" placeholder="Sashimi Price">
        <div id= "sustainable">
        <label for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        </div>
    <input type="submit" value="Save">
</form>
</div>
<script src="js/edit.js"></script>
</body>
</html>