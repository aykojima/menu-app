<?php include('../includes/header.php'); ?>
    <!--@to do
         -->
    <button id="search" onclick="show_items()">Search</button>
<div id="item_box">
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
    </div>
    <div id='edit_div' >
    <button id='close_tab' onclick='hide_edit_div()'>X</button>
      <form>
        <!--<input type="text" name="sushi_key" id="sushi_key" placeholder="Sushi Key" value="<?php echo htmlentities($sushi_key); ?>">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo htmlentities($name); ?>">

        <input type="text" name="origin" id="origin" placeholder="Origin" value="<?php echo htmlentities($origin); ?>">

        <input type="text" name="sushi_price" id="sushiPrice" placeholder="Sushi Price" onkeyup="calcSashimi()">

        <input type="text" name="sashimi_price" id="sashimiPrice" placeholder="Sashimi Price">
        <div id= "sustainable">
        <label for=sustainable>Sustainable:</label>
        <input type="checkbox" name="sustainability" id="sustainability">
        </div>
    <input type="submit" value="Save">-->
    </div>
 </div>



    <a id="print" href="javascript:window.print()">PRINT</a>
    <div id="container">
    <p class="notes"><img id="fish-vertical" src='../images/fish.png' alt='fish' style=width:15px;>sustainable "best" or "good alternative" seafood 
        *raw or undercooked meats, poultry, seafodd, shellfish or eggs 
        may increase your risk of foodborne illness</p>
    <div id="menu">
    <div id='show_result_rolls'>
    
    <h1 class='rolls'>Special Rolls</h2>
    <div id="special_rolls"></div>
    <h1 class='rolls'>Rolls</h2>
    <div id="rolls"></div>
    <h1 class='rolls'>Vegetable Rolls</h2>
    <div id="vegetable_rolls"></div>
    
    </div>
    
    <?php include('../includes/footer.php'); ?>
