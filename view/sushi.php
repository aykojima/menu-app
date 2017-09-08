<?php include('../includes/header.php'); ?>
    <!--@to do
     @Style it so that it exactly same as the original
     @DB credentials into config file
     @print out be able to select "custom" paper size by default
     @Be able to search item with any words (e.g. you can get to "Tuna*/Maguro" by typing "Maguro")
    -->


<!-- <button id="search" onclick="show_items()">Search</button> -->
<div id="item_box">
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
    </div>
    <div id='edit_div' >
    <button id='close_tab' onclick='hide_edit_div()'>X</button>
      <form>
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
    <input type="delete" value="delete">
    </div>
 </div>

 <!--
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
    </div>

    
    <a id="print" href="javascript:window.print()">PRINT</a>
-->
    <div id="trash"><img src='../images/remove_icon.png' class='nav_icons' style="margin-top:300px"></div>


    <div id="container">
    <p class="notes"><img id="fish-vertical" src='../images/fish.png' alt='fish' style=width:15px;>sustainable "best" or "good alternative" seafood 
        *raw or undercooked meats, poultry, seafodd, shellfish or eggs 
        may increase your risk of foodborne illness</p>
    <div id="menu">
    <h2 id="dates"></h2>
    <div class="date">
        <input type="button" id="left" value=" < " onclick="changeDate('left')"/>
    </div>
    <div class="date">
        <input type="button" id="right" value=" > " onclick="changeDate('right')"/> 
    </div>
    
    <h1 id="sushiBar">Sushi Bar</h1>
    <p class="verticalSashimi">Sashimi</p>
    <p class="verticalSushi">Nigiri<br>Sushi</p>
    
    <table id="showResult" class="style">
    </table>
    <div class="gratuity"><p>We would like to inform our guests that in place of gratuity a 20% service charge is included in the total (excludes take out).
    100% of these funds are distributed to the staff in form of wages, benefits and revenue share.
    Additional gratuity is not expected.</p></div>
    </div>
    <?php include('../includes/footer.php'); ?>
