<?php include('includes/header.php'); ?>
    <!--@to do
     @Style it so that it exactly same as the original
     @DB credentials into config file
     @Date picker
     @Items in alphabetic order =>okay, except Salmon Belly goes before Salmon. Need to be fixed!
     @print out
     @Be able to search item with any words (e.g. you can get to "Tuna*/Maguro" by typing "Maguro")
     @when hit "not maches found" in the search box.. currently it breaks the app
     @Albacore Tuna cannot be deleted when there is Albacore Tuna Belly exists
    -->
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>       
    </div>
    
    <div id="container">
    
    <div id="menu">
    <h2>Friday 06. 30. 2017</h2>
    <h1>Sushi Bar</h1>
    <table id="showResult">
            <!--<?php $test = new Database; $test->db(); ?>-->
    </table>
    <div class="gratuity"><p>We would like to inform our guests that in place of gratuity a 20% service charge is included in the total (excludes take out).
    100% of these funds are distributed to the staff in form of wages, benefits and revenue share.
    Additional gratuity is not expected.</p></div>
    </div>
    <?php include('includes/footer.php'); ?>
