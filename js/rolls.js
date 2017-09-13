/***caching the menu array***/
var stored_key_array_1005 = [], stored_key_array_1006 = [], stored_key_array_1007 = [], 
stored_key_arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
var TodaysMenuKey;

var stored_special_rolls = []//localStorage.getItem("special_rolls");
var stored_rolls = []//localStorage.getItem("rolls");
var stored_vegetable_rolls = []//localStorage.getItem("vegetable_rolls");

$(document).ready(function(){

    get_roll_menu();         
    //set timeout 3sec to allow the page to be fully loaded
    setTimeout(sortSpecialRolls, 2000);
    setTimeout(sortRolls,2000);
    setTimeout(sortVegetableRolls, 2000);

    setTimeout(style_rolls, 3000);

    

                        
});

// if (stored_special_rolls || stored_rolls || stored_vegetable_rolls === true) {
//     special_rolls = JSON.parse(stored_special_rolls);
//     //console.log(appetizer);
//     rolls = JSON.parse(stored_rolls);
//     vegetable_rolls = JSON.parse(stored_vegetable_rolls);

//     display("special_rolls", special_rolls);
//     display("rolls", rolls);
//     display("vegetable_rolls", vegetable_rolls);
//     }
// else  {var special_rolls = [], rolls = [], vegetable_rolls = [];}


function get_roll_menu(){

    $.get({
        url:"../db/store_menu_roll.php",
        success: function(data){
            stored_key_array = JSON.parse(data);
            //console.log(stored_key_array[0]);
            stored_key_array_1005 = stored_key_array[0];
            stored_key_array_1006 = stored_key_array[1];
            stored_key_array_1007 = stored_key_array[2];
        
            console.log(stored_key_array_1005, stored_key_array_1006, stored_key_array_1007);
            
            stored_key_array_1005.forEach(myFunction);
            stored_key_array_1006.forEach(myFunction);
            stored_key_array_1007.forEach(myFunction);

        }
    });
}

function myFunction(item){
    $.post("../db/items.php", {term_rolls: item}).done(function(data){     
        //console.log(data);  
        storeInArray(data, stored_special_rolls, stored_rolls, stored_vegetable_rolls);
    });
}


function function_name(){
    stored_key_array.forEach(function(element) {
        console.log(element);
        $.post("../db/items.php", {term_rolls: element}).done(function(data){  
            storeInArray(data, stored_special_rolls, stored_rolls, stored_vegetable_rolls);
        });
    });
}

display("special_rolls", stored_special_rolls);
display("rolls", stored_rolls);
display("vegetable_rolls", stored_vegetable_rolls);


/***search box***/
/*$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change 
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){           
            $.ajax({
                url: "../db/search.php",
                data: {term_rolls: inputVal},
                success: function(data){
                // Display the returned data in browser
                resultDropdown.html(data)},
                });
        } else{
            resultDropdown.empty();
        }
    });
    $('.search-box input[type="text"]').blur(function(){
        var resultDropdown = $(this).siblings(".result");
        $(this).val('');
        resultDropdown.empty();
    });
}); 
*/


function show_items(){
  $("#item_box").toggle();
  $.ajax({
              url: "../db/test.php",
              data: {search_roll: 'all'},
              success: function(data){
              // Display the returned data in browser
              $(".result").html(data)},
            });
  
}

  /***search-box***/
$(document).ready(function(){
    //var resultDropdown = $('.search-box input[type="text"]').siblings(".result");
    $('.search-box input[type="text"]').on("keyup input", function(){    
        var inputVal = $(this).val();  
        if(inputVal.length){           
            $.ajax({
                url: "../db/test.php",
                data: {search_roll: inputVal},
                success: function(data){
                // Display the returned data in browser
                $(".result").html(data)},
                });
        }else{
            $.ajax({
              url: "../db/test.php",
              data: {search_roll: 'all'},
              success: function(data){
              // Display the returned data in browser
              $(".result").html(data)},
            });

        }
    });

}); 

function show_edit_div(){
  $("#edit_div").show('slow');
}

function hide_edit_div(){
     $("#edit_div").hide();
}




//  //sort and store new order in array
//   var sort_items_special_rolls = { sortSpecialRolls: sortSpecialRolls};
//   var sort_items_rolls = { sortRolls: sortRolls};
//   var sort_items_vegetable_rolls = { sortVegetableRolls: sortVegetableRolls};
//   x = 'sortSpecialRolls', y = 'sortRolls', z = 'sortVegetableRolls';   

//   sort_items_special_rolls[x]();
//   sort_items_rolls[y]();
//   sort_items_vegetable_rolls[z]();



/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){         
        var item = $(this).attr('id');
        var items = $(this).attr('class');
        var position = item.indexOf("-");
        var new_key = item.slice(0, position);
        //console.log(items);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
            //if "No matches found", 
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();

        }else if(item == "addall"){
            for(var i = 1; i <23; i++){
            $.post("../db/items.php", {term_rolls: i}).done(function(data){     
                //console.log(data);      
                storeInArray(data, stored_special_rolls, stored_rolls, stored_vegetable_rolls);           
                // sort_items_special_rolls[x]();
                // sort_items_rolls[y]();
                // sort_items_vegetable_rolls[z]();
            });
            
        }
        //call the function 3 sec later to give ajax a time to get all the data
            setTimeout(get_id_and_store_in_array, 3000); 
        //set timeout 3sec to allow the page to be fully loaded
            setTimeout(sortSpecialRolls, 1000);
            setTimeout(sortRolls,1000);
            setTimeout(sortVegetableRolls, 1000);

            setTimeout(style_rolls, 1500);   

                     
        }else if(item == "empty"){
            stored_key_array_1005 = [], stored_key_array_1006 = [], stored_key_array_1007 = [], 
            stored_special_rolls = [], stored_rolls = [], stored_vegetable_rolls = [];
            var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
            storeKeyInDb(arrays);
            // localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
            // localStorage.setItem("rolls", JSON.stringify(rolls));
            // localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
            document.getElementById("special_rolls").innerHTML = '';
            document.getElementById("rolls").innerHTML = '';
            document.getElementById("vegetable_rolls").innerHTML = '';

        }else if(isNaN(new_key) == false && checkId(items, item) === true)
        {//add a item to the table
            if (items == 'special_rolls'){
                stored_key_array_1005.push(new_key);
            }else if (items == 'rolls'){
                stored_key_array_1006.push(new_key);
            }else if (items == 'vegetable_rolls'){
                stored_key_array_1007.push(new_key);
            }

            var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
            
            console.log(arrays);
            storeKeyInDb(arrays);

            //console.log(new_key);                 
            $.post("../db/items.php", {term_rolls: new_key}).done(function(data){
                storeInArray(data, stored_special_rolls, stored_rolls, stored_vegetable_rolls);
                // sort_items_special_rolls[x]();
                // sort_items_rolls[y]();
                // sort_items_vegetable_rolls[z]();

         });
            setTimeout(sortSpecialRolls, 2000);
            setTimeout(sortRolls,2000);
            setTimeout(sortVegetableRolls, 2000);
            //style menu
            setTimeout(style_rolls, 2500);
        }else{//take out the item
            var checkedId = checkId(items, new_key);

            alert('This item already exists in the current menu. This item will be removed.');
            if(items == 'special_rolls'){
                //console.log(appetizer);
                stored_special_rolls.splice(checkedId, 1);
                stored_key_array_1005.splice(checkedId, 1);
                console.log(stored_key_array_1001);
                //console.log(appetizer);
            }
            else if(items == 'rolls'){
                stored_rolls.splice(checkedId, 1);
                stored_key_array_1006.splice(checkedId, 1);
            }else if(items == 'vegetable_rolls'){
                stored_vegetable_rolls.splice(checkedId, 1);
                stored_key_array_1007.splice(checkedId, 1);
            }else{'We cannot take out the menu'}

            var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
            storeKeyInDb(arrays);

            var new_item = document.getElementById(new_key);
                $(new_item).fadeOut("slow", function(){
                    console.log(new_item);
                    new_item.remove();   
            // localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
            // localStorage.setItem("rolls", JSON.stringify(rolls));
            // localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
            //location.reload();
             });
        } 
            //clear the text in textbox and search drop down  
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
          
});

//});
function get_id_and_store_in_array(){
    $('#sortable_special_rolls li').each(function() {
        stored_key_array_1005.push(this.id);
        //console.log(stored_key_array_1001);
    });
    $('#sortable_rolls li').each(function() {
        stored_key_array_1006.push(this.id);
        //console.log(stored_key_array_1002);       
    });  
    $('#sortable_vegetable_rolls li').each(function() {
        stored_key_array_1007.push(this.id);
        //console.log(stored_key_array_1003);
    });
            
    var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
    storeKeyInDb(arrays);

}

function storeKeyInDb(array){
    var json_array = JSON.stringify(array);
    console.log(json_array);
    $.ajax({
        url: "../db/store_menu_roll.php",
        method: "POST",
        data: {term: json_array},
        success: function(data){
            console.log(data);
        // Display the returned data in browser
        //console.log(data)
    },
        });

}


function style_rolls(){
    $("#show_result_rolls div#gf ").css('width', '17px');
    $("#show_result_rolls div#ippin_menu[data-name='no_sustainable'] ").css('padding-left', '21px');
    $("#show_result_rolls li.sortable ").css('margin', '5px 0 5px 0');
    $("#show_result_rolls h2").css('margin', '2px 0 0 0');
}

function sortSpecialRolls(){
    $( "#sortable_special_rolls").sortable({
        axis: 'y',
        cursor: "-webkit-grabbing",
        update: function (event, ui) {
        var list = document.getElementById('sortable_special_rolls');
        stored_special_rolls = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            stored_special_rolls.push(test);    
        }
        //console.log(special_rolls);
        //localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
        var stored_key_array_1005 = $(this).sortable('toArray', { attribute: 'id' });
        //console.log('data: ' + stored_key_array_1005);
        var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
        storeKeyInDb(arrays);
        }
    });
    getDraggables();
}




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
        // console.log(rolls);
        // localStorage.setItem("rolls", JSON.stringify(rolls));
        var stored_key_array_1006 = $(this).sortable('toArray', { attribute: 'id' });
        //console.log('data: ' + stored_key_array_1005);
        var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
        storeKeyInDb(arrays);
        }
    });
    getDraggables();
}


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
        // console.log(vegetable_rolls);
        // localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
        var stored_key_array_1007 = $(this).sortable('toArray', { attribute: 'id' });
        //console.log('data: ' + stored_key_array_1005);
        var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
        storeKeyInDb(arrays);
        }
    });
    getDraggables();
}

function sortInArrays(data, i){
    var obj = [JSON.parse(data)];
    var obj1 = obj[0], key1;

    for(var key in obj1){
        if(obj1.hasOwnProperty(key)){
            key1 = key;
            }
    }
    var item = obj[0][key1];

    if (key1 == 'special_rolls'){
        stored_key_array_1005.push(i);
    }else if (key1 == 'rolls'){
        stored_key_array_1006.push(i);
    }else if (key1 == 'vegetable_rolls'){
        stored_key_array_1007.push(i);
    }
}

function storeInArray(data, stored_special_rolls = [], stored_rolls = [], stored_vegetable_rolls = []){
    //store feched items in an array and display in table
    console.log(data);
    var obj = [JSON.parse(data)];
    //console.log(obj);
    
    //get the keys
    var obj1 = obj[0], key1;
    //console.log(obj[0]);
    //console.log(key1);
    for(var key in obj1){
        if(obj1.hasOwnProperty(key)){
            //Keys.push(key);
            key1 = key;
            }
    }
    var item = obj[0][key1];
    
    if (key1 == 'special_rolls'){
        stored_special_rolls.push(item);
        display(key1, stored_special_rolls);
        ;
    }else if (key1 == 'rolls'){
        stored_rolls.push(item);
        display(key1, stored_rolls);
       
    }else if (key1 == 'vegetable_rolls'){
        stored_vegetable_rolls.push(item);
         display(key1, stored_vegetable_rolls);
        
    }else{
        return 'no category';
    }
    /***store data***/
    // localStorage.setItem("special_rolls", JSON.stringify(special_rolls));
    // localStorage.setItem("rolls", JSON.stringify(rolls));
    // localStorage.setItem("vegetable_rolls", JSON.stringify(vegetable_rolls));
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
    $("#show_result_rolls div#ippin_menu").css({'font-size': '0.9em'});
    $("#show_result_rolls div#roll_description").css('line-height', '0.9em');
    $("h1.rolls").css('margin-top', '30px');
    $("h1.rolls:first-child").css('margin-top', '0');
    $("#show_result_rolls li").css('margin-bottom', '8px');

});

//a trash can appears when hovering an item
var $trash = $("#trash");
//$(document).ready(getDraggables());
function getDraggables(){
    $("#show_result_rolls li").mousedown(function(){
        $trash.addClass("hover");
    });
    $("#show_result_rolls li").mouseleave(function(){
        $trash.removeClass("hover");
        $trash.droppable({
        accept: "#show_result_rolls li",
        //accept: '#show_result_rolls ul li',
        classes: {
            "ui-droppable-active": "ui-state-highlight"
        },
        drop: function( event, ui ) {
            deleteImage( ui.draggable );
        },
        tolerance: "fit",
        hoverClass: "highlight"
        });
    });

};

function deleteImage(item) {
    
      var deleteId = item.attr('id');
      var itemCategory = item.closest("div").attr('id'); 

      var checkedId = checkId(itemCategory, deleteId); 
      if(itemCategory == 'special_rolls'){
            //console.log(appetizer);
            stored_special_rolls.splice(checkedId, 1);
            stored_key_array_1005.splice(checkedId, 1);
            console.log(stored_key_array_1001);
        }
        else if(itemCategory == 'rolls'){
            stored_rolls.splice(checkedId, 1);
            stored_key_array_1006.splice(checkedId, 1);}
        else if(itemCategory == 'vegetable_rolls'){
            stored_vegetable_rolls.splice(checkedId, 1);
            stored_key_array_1007.splice(checkedId, 1);
        }else{'We cannot take out the menu'}

       
        var arrays = [stored_key_array_1005, stored_key_array_1006, stored_key_array_1007];
        storeKeyInDb(arrays);

       item.fadeOut().remove();
       $trash.removeClass("hover");
       changeHeight();
    }
