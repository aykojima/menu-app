<?php include('../includes/header.php'); ?>
    <!--@to do
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
 </div>

    <!--<a id="print" href="javascript:window.print()">PRINT</a>-->
<div id="trash"><img src='../images/remove_icon.png' class='nav_icons' style="margin-top:300px"></div>
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
