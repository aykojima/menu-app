<?php include('../includes/header.php'); ?>
    <!--@to do
    @style the menu - height of div
    @add all
    @add edit pages for ippins
    @style add page
    @form validation
    @fix navigation in ippin page
     -->
   <!-- <button id="search" onclick="show_items()">Search</button> -->
<div id="item_box">
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
    </div>
    <div id='edit_div' >
    <button id='close_tab' onclick='hide_edit_div()'>X</button>
        
            <form action="../db/edit_ippin.php" method="post">
                    <input type="text" name="ippin_key" id="ippin_key" placeholder="Ippin Key">
                    <input type="text" name="name" id="name" placeholder="Name">

                    <input type="text" name="price" id="price" placeholder="Price">

                    <select name="category" id="category" placeholder="category">
                        <option id='a' value="appetizer">appetizer</option>
                        <option id='t' value="tempura">tempura</option>
                        <option id='f' value="fish_dish">fish dish</option>
                        <option id='m' value="meat_dish">meat dish</option>
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
 </div>



    <div id="trash"><img src='../images/remove_icon.png' class='nav_icons' style="margin-top:300px"></div>
    <div id="container">
    <p class="notes"><img id="fish-vertical" src='../images/fish.jpg' alt='fish' style=width:15px;>sustainable "best" or "good alternative" seafood 
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
    
    <h1 id="ippin">Ippins</h1>
     <div id='show_result_ippin'>
    <div id="appetizer"></div>
    <div id="tempura"></div>
    <div id="fish_dish"></div>
    <div id="meat_dish"></div>
    </div>
    <div class="gratuity"><p>We would like to inform our guests that in place of gratuity a 20% service charge is included in the total (excludes take out).
    100% of these funds are distributed to the staff in form of wages, benefits and revenue share.
    Additional gratuity is not expected.</p></div>
    </div>
<?php include('../includes/footer.php'); ?>


