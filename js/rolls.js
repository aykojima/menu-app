/***caching the menu array***/

var stored_special_rolls = localStorage.getItem("special_rolls");
var stored_rolls = localStorage.getItem("rolls");
var stored_vegetable_rolls = localStorage.getItem("vegetable_rolls");

if (stored_special_rolls || stored_rolls || stored_vegetable_rolls === true) {
    special_rolls = JSON.parse(stored_special_rolls);
    //console.log(appetizer);
    rolls = JSON.parse(stored_rolls);
    vegetable_rolls = JSON.parse(stored_vegetable_rolls);

    display("special_rolls", special_rolls);
    display("rolls", rolls);
    display("vegetable_rolls", vegetable_rolls);
    }
else  {var special_rolls = [], rolls = [], vegetable_rolls = [];}



/***search box***/
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){           
            $.ajax({
                url: "db/search.php",
                data: {term_rolls: inputVal},
                success: function(data){
                // Display the returned data in browser
                resultDropdown.html(data)},
                });
        } else{
            resultDropdown.empty();
        }
    });
}); 


 //sort and store new order in array
  var sort_items_special_rolls = { sortSpecialRolls: sortSpecialRolls};
  var sort_items_rolls = { sortRolls: sortRolls};
  var sort_items_vegetable_rolls = { sortVegetableRolls: sortVegetableRolls};
  x = 'sortSpecialRolls', y = 'sortRolls', z = 'sortVegetableRolls';   

  sort_items_special_rolls[x]();
  sort_items_rolls[y]();
  sort_items_vegetable_rolls[z]();






/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){         
        var item = $(this).attr('id');
        var items = $(this).attr('class');
        //console.log(items);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
            //if "No matches found", 
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();

        }else if(item == "addall"){
            for(var i = 1; i <23; i++){
            $.post("db/items.php", {term_rolls: i}).done(function(data){     
                //console.log(data);      
                storeInArray(data, special_rolls, rolls, vegetable_rolls);
            
            sort_items_special_rolls[x]();
            sort_items_rolls[y]();
            sort_items_vegetable_rolls[z]();
            });
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
             
            
            }
            //items.forEach(function(item) {
              //  storeInArray(item);
            //});
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();                       
        }else if(item == "empty"){
            special_rolls = [], rolls = [], vegetable_rolls = [];
            localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
            localStorage.setItem("rolls", JSON.stringify(rolls));
            localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
            document.getElementById("show_result_rolls").innerHTML = '';
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else if(isNaN(item) == false && checkId(items, item) === true)
        {//add a item to the table                 
            $.post("db/items.php", {term_rolls: item}).done(function(data){
            storeInArray(data, special_rolls, rolls, vegetable_rolls);
            sort_items_special_rolls[x]();
            sort_items_rolls[y]();
            sort_items_vegetable_rolls[z]();
            
            $(document).ready(function(){
            $("#show_result_rolls div#gf ").css('width', '17px');
            $("#show_result_rolls div#ippin_menu[data-name='no_sustainable'] ").css('padding-left', '21px');
            $("#show_result_rolls li.sortable ").css('margin', '5px 0 5px 0');
            $("#show_result_rolls h2").css('margin', '2px 0 0 0');
        });

         });
        
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else{//take out the item
            var checkedId = checkId(items, item);
            if(items == 'special_rolls'){
                //console.log(appetizer);
                special_rolls.splice(checkedId, 1);
                //console.log(appetizer);
            }
            else if(items == 'rolls'){rolls.splice(checkedId, 1);}
            else if(items == 'vegetable_rolls'){vegetable_rolls.splice(checkedId, 1);}
            else{'We cannot take out the menu'}
            localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
            localStorage.setItem("rolls", JSON.stringify(rolls));
            localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
            location.reload();
        } 
          
});

//});

function sortSpecialRolls(){
    $( "#sortable_special_rolls").sortable({
        axis: 'y',
        cursor: "move",
        update: function (event, ui) {
        var list = document.getElementById('sortable_special_rolls');
        special_rolls = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            special_rolls.push(test);    
        }
        console.log(special_rolls);
        localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
        
            }
        }); 
    };



function sortRolls(){
    $( "#sortable_rolls" ).sortable({
        axis: 'y',
        update: function (event, ui) {
        var list = document.getElementById('sortable_rolls');
        rolls = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            rolls.push(test);
            
        }
        console.log(rolls);
        localStorage.setItem("rolls", JSON.stringify(rolls));
        
            }
    });
};


function sortVegetableRolls(){
    $( "#sortable_vegetable_rolls" ).sortable({
        axis: 'y',
        update: function (event, ui) {
        var list = document.getElementById('sortable_vegetable_rolls');
        vegetable_rolls = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            vegetable_rolls.push(test);
            
        }
        console.log(vegetable_rolls);
        localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
        
            }
    });
};


function storeInArray(data, special_rolls = [], rolls = [], vegetable_rolls = []){
    //store feched items in an array and display in table
    var obj = [JSON.parse(data)];
    //console.log(obj);
    
    //get the keys
    var obj1 = obj[0], key1;
    for(var key in obj1){
        if(obj1.hasOwnProperty(key)){
            //Keys.push(key);
            key1 = key;
            }
    }
    var item = obj[0][key1];
    
    if (key1 == 'special_rolls'){
        special_rolls.push(item);
        display(key1, special_rolls);
        ;
    }else if (key1 == 'rolls'){
        rolls.push(item);
        display(key1, rolls);
       
    }else if (key1 == 'vegetable_rolls'){
        vegetable_rolls.push(item);
         display(key1, vegetable_rolls);
        
    }else{
        return 'no category';
    }
    /***store data***/
    localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
    localStorage.setItem("rolls", JSON.stringify(rolls));
    localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
    //console.log(JSON.stringify(appetizer));

    //checkSustainability(items);
    //styleLineHeight(items);
    //styleMargin(items);
}


function display(key, array){
    var string ="<ul id='sortable_" + key + "'>";
    for(i=0; i < array.length; i++)
        {
                string +=array[i];
        }  
        string +='</ul>';
        document.getElementById(key).innerHTML = string;
}

function checkId(roll_class, roll_key) {    
    //for(var i=0; i<array.length; i++){
        //var ul = document.getElementById("sortable_" + ippinClass);//("'sortable_" + array + "'");
        var div = document.getElementById(roll_class);
        var li = div.getElementsByTagName("li");
        if(0 < li.length){
        for (var i = 0; i < li.length; ++i) {
            var id = li[i].getAttribute('id');
            console.log(id);
            if(id == roll_key)
            { return i; }
            }
            {return true; }
            
      }else{ return true; }
   // }
}

/*
$document.ready(function(){
    console.log($('#show_result_rolls').height());
});*/

var change_height = function changeHeight(){
                console.log($('#show_result_rolls').height());
                var max_height = $('#show_result_rolls').height();
                if(max_height > 1000 && max_height < 1149)
                {
                    $('#show_result_rolls').find('ul').addClass('changed_height1');
                }
                else if(max_height > 1150 && max_height < 1199)
                {
                    $('#show_result_rolls').find('ul').addClass('changed_height2');
                    $('#show_result_rolls').find('div#gf').css('padding-top', '5px');
                    $('#show_result_rolls').find('img#fish').css('margin-top', '0');
                }
                else if(max_height > 1200 && max_height < 1300)
                {
                    $('#show_result_rolls').find('ul').addClass('changed_height3');
                    /*$('#menu').addClass('changed_height3');*/
                    $('#dates').addClass('changed_height3');
                    $('#ippin').addClass('changed_height3');
                    $('#show_result_rolls').find('div#gf').css('padding-top', '5px');
                    $('#show_result_rolls').find('img#fish').css('margin-top', '0');

                }
            }();

$(document).ready(function(){
    $("#show_result_rolls div#gf ").css('width', '17px');
    $("#show_result_rolls div#ippin_menu[data-name='no_sustainable'] ").css('padding-left', '21px');
    $("#show_result_rolls li.sortable ").css('margin', '5px 0 5px 0');
    $("#show_result_rolls h2").css('margin', '2px 0 0 0');
});