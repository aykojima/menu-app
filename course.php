<?php include('includes/header.php'); ?>
    <!--@to do
    @style - print
    @store items in db
     -->
    <?php include('includes/header.php'); ?>
    <div class="search-box">
            <input type="text" autocomplete="off" placeholder="Search..." />
            <div class="result"></div>       
        </div>

    <a id="print" href="javascript:window.print()">PRINT</a>
    <div id="container">
    <div id="menu">
    <h1 id="ippin">Course Meals</h1>
     <div id='show_result_course'>


    <div id="two" class="courses">
        <h2>Two courses</h2>
        <div class="additionals">
        <p class="name">Served with miso soup</p>
        <p class="name">Substitute with all sustainable fish/ +3</p>
        </div>
            <div class="course">
                <ul>
                    <li>
                        <div><p class="name">Bara Chirashi*</p><p class="price">25</p></div>
                        <div class="description">sushi rice layered with nori, tamago, ginger and topped with a mix of tuna, salmon, yellowtail and ikura</div>
                    </li>
                    <li>
                        <div><p class="name">Sushi Combo*</p><p class="price">28</p></div>
                        <div class="description">seven pieces of nigiri sushi and a roll</div>
                    </li>
                    <li>
                        <div><p class="name">Sashimi Combo*</p><p class="price">30</p></div>
                        <div class="description">variety of sashimi chosen by the chef served with rice</div>
                    </li>
                </ul>
            </div>
    </div>


    <div id="three" class="courses">
    <h2>Three courses</h2>
    <div class="additionals">
    <p class="name">Add sashimi course</p><p class="price">15</p>
    <p class="name">Add sake pairing</p><p class="price">23</p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Washington albacore tuna and mustard green*,</li>
                                <li>Shigoku oysters on the half shell*, or</li>
                                <li>String bean salad</li>
                            </ul>  
                    </li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Bara chirashi*, or</li>
                                <li>Sushi combination*</li>
                            </ul>  
                    </li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Chestnut and butter scotch creme brulee,</li>
                                <li>House made millet mochi with azuki beans, or</li>
                                <li>Yuzu and yogurt panna cotta</li>
                            </ul>  
                    </li>
                </ul>
            </div>
    </div>

    <div id="five" class="courses">
    <h2>Five courses</h2>
    <div class="additionals">
    <p class="name">Add sashimi course</p><p class="price">15</p>
    <p class="name">Add sake pairing</p><p class="price">34</p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Washington albacore tuna and mustard green*,</li>
                                <li>Shigoku oysters on the half shell*, or</li>
                                <li>String bean salad</li>
                            </ul>  
                    </li>
                    <li class="need_margin">Chawanmushi</li>
                    <li class="need_margin">Special roll*</li>
                    <li class="need_margin">Shef's selection of 7 pieces of Sushi</li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Chestnut and butter scotch creme brulee,</li>
                                <li>House made millet mochi with azuki beans, or</li>
                                <li>Yuzu and yogurt panna cotta</li>
                            </ul>  
                    </li>
                </ul>
            </div>
    </div>

    <div id="six" class="courses">
    <h2>Six courses</h2>
    <div class="additionals">
    <p class="name">Add sashimi course</p><p class="price">15</p>
    <p class="name">Add sake pairing</p><p class="price">40</p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Washington albacore tuna and mustard green*,</li>
                                <li>Shigoku oysters on the half shell*, or</li>
                                <li>String bean salad</li>
                            </ul>  
                    </li>
                    <li class="need_margin">Chawanmushi</li>
                    <li class="need_margin">Black cod miso yuan yaki</li>
                    <li class="need_margin">Chef's selection of 5 pieces of Sushi</li>
                    <li class="need_margin">Shef's selection of 5 pieces of Sushi</li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li>Chestnut and butter scotch creme brulee,</li>
                                <li>House made millet mochi with azuki beans, or</li>
                                <li>Yuzu and yogurt panna cotta</li>
                            </ul>  
                    </li>
                </ul>
            </div>
</div>


<div id='show_result_course'>
    <h1>Omakase</h1>
    <div id="omakase" class="courses">
        <div class="additionals">
    <p>Featuring local and seasonal ingredients in an authentic yet creative Japanese preparation.</p>
    </div>
    <h3 class="name">Omakase sashimi</h3><h3 class="price">MP</h3>
    <h3 class="name">Omakase sushi</h3><h3 class="price">MP</h3>
    <h3 class="name">Seven course Omakase</h3><h3 class="price">110</h3>
    <div class="additionals">
    <p class="name">Add sake pairing</p><p class="price">55</p>
    </div>
    </div>
</div>
    
    
    </div>
<?php include('includes/footer.php'); ?>


