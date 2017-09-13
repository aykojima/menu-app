//menu object
var appetizer = {
    category:"appetizer",
    keys: [],
    menu_list: []
};

var tempura = {
    category:"tempura",
    keys: [],
    menu_list: []
};

var fish_dish = {
    category:"fish_dish",
    keys: [],
    menu_list: []
};

var meat_dish = {
    category:"meat_dish",
    keys: [],
    menu_list: []
};


//var stored_key_array_1001 = [], stored_key_array_1002 = [], stored_key_array_1003 = [], stored_key_array_1004 = [], 
stored_key_arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
var TodaysMenuKey;
//var appetizer = [], tempura = [], fish_dish = [], meat_dish = [];
//on page load, get stored_key_array stored in db
$(document).ready(function(){
              //for(var i = 1001; i <1005; i++){    
        get_ippin_menu();         
        $.get({
        url:"../db/store_menu_ippin.php",
        method: "GET",
        data: {keys: 'get-keys'},
        success: function(data){
            var array = JSON.parse(data);
            //console.log(JSON.parse(data));
            array.forEach(assign_to_array)
            console.log(appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys);
        }
        

        });
        // stored_key_array_1001.forEach(myFunction);
        // stored_key_array_1002.forEach(myFunction);
        // stored_key_array_1003.forEach(myFunction);
        // stored_key_array_1004.forEach(myFunction);
        // //set timeout 3sec to allow the page to be fully loaded
        // setTimeout(sortAppetizer, 1000);
        // setTimeout(sortTempura, 1000);
        // setTimeout(sortFishDish, 1000);
        // setTimeout(sortMeatDish, 1000);
            //     //stored_key_array.push(i);
            //     console.log(i);//storeKeyInDb(stored_key_array); 
            //     $.ajax({
            //     url: "../db/store_menu_ippin.php",
            //     data: {get_menu: i},
            //     success: function(data){
            //     console.log(i);
            //     }
            // });
            
           
                //console.log(data);      
                // storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
                // sort_items_appetizer[w]();
                // sort_items_tempura[x]();
                // sort_items_fish_dish[y]();
                // sort_items_meat_dish[z]();
            // });    


            //} 
                        
});


function assign_to_array(item, index) {
    //console.log("index[" + index + "]: " + item);
    if (index == 0){
        appetizer.keys = item;
    }else if (index == 1){
        tempura.keys = item;     
    }else if (index == 2){
        fish_dish.keys = item;
    }else if (index == 3){
        meat_dish.keys = item;
    }
}

function get_ippin_menu(){
    //TodaysMenuKey = i;
    //console.log(TodaysMenuKey);
    //var stored_key_array = ['stored_key_array_' + TodaysMenuKey];
    //storeKeyInDb(stored_key_array); 
    // $.post("../db/store_menu_ippin.php", {get_menu: i}).done(function(data){     
    //             console.log(data);
    //             stored_key_array_1001 = JSON.parse(data);
    //});
    $.get({
        url:"../db/store_menu_ippin.php",
        success: function(data){
            //stored_key_array = JSON.parse(data);
            //console.log(data);
            //  $.each(data, function(index, el) {
            //     console.log("element at " + index + ": " + el);
            // //alert("element at " + index + ": " + el); // will alert each value
            //     });
            //console.log(data);
            
            var obj = [JSON.parse(data)];
            
            obj.forEach(function(element) {
                //console.log(element);
                element.forEach(function(el){
                    //console.log(el);
                    store_in_array(el, appetizer.menu_list, tempura.menu_list, fish_dish.menu_list, meat_dish.menu_list);
                });
            });
            //console.log(stored_key_arrays);
            sortAppetizer(); sortTempura(); sortFishDish(); sortMeatDish();
        //     for (var i = 0; i < data.length; i++) {
        //     // outputfromserver[i] can be used to get each value
        //     //store_in_array(data, appetizer, tempura, fish_dish, meat_dish);
        //     console.log('data: ' + data[i]);
        // }
            changeHeight();
            // stored_key_array_1001 = stored_key_array[0];
            // stored_key_array_1002 = stored_key_array[1];
            // stored_key_array_1003 = stored_key_array[2];
            // stored_key_array_1004 = stored_key_array[3];
            //console.log(stored_key_array_1001, stored_key_array_1002, stored_key_array_1003, stored_key_array_1004);
            
        }
    });
}


function store_in_array(data, appetizer = [], tempura= [], fish_dish= [], meat_dish= []){
    //console.log(data);
    var obj = data;
    var key1 = Object.keys(obj);
   
    if (key1 == 'appetizer'){
        var item = style_origin(obj.appetizer);
        //console.log(item);
        appetizer.push(item);
        display(key1, appetizer);
        
    }else if (key1 == 'tempura'){
        var item = style_origin(obj.tempura);
        tempura.push(item);
        display(key1, tempura);
       
    }else if (key1 == 'fish_dish'){
        var item = style_origin(obj.fish_dish);
        fish_dish.push(item);
         display(key1, fish_dish);
        
    }else if (key1 == 'meat_dish'){
        var item = style_origin(obj.meat_dish);
        meat_dish.push(item);
         display(key1, meat_dish);
       
    }else{
        return 'no category';
    }
}

// function myFunction(item){
//     $.post("../db/items.php", {term_ippin: item}).done(function(data){     
//         //console.log(data);  
//         storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
//     });
// }


// function function_name(){
//     stored_key_array.forEach(function(element) {
//         console.log(element);
//         $.post("../db/items.php", {term_ippin: element}).done(function(data){  
//             storeInArray(data, appetizer, tempura, fish_dish, meat_dish);          
//         });
//     });
// }
/***caching the menu array***/
// var stored_app = localStorage.getItem("appetizer");
// var stored_temp = localStorage.getItem("tempura");
// var stored_fish = localStorage.getItem("fish_dish");
// var stored_meat = localStorage.getItem("meat_dish");

// if (stored_app || stored_temp || stored_fish || stored_meat === true) {
//     appetizer = JSON.parse(stored_app);
//     console.log(appetizer);
//     tempura = JSON.parse(stored_temp);
//     fish_dish = JSON.parse(stored_fish);
//     meat_dish = JSON.parse(stored_meat);

    // display("appetizer", appetizer);
    // display("tempura", tempura);
    // display("fish_dish", fish_dish);
    // display("meat_dish", meat_dish);
//     }
// else  {var appetizer = [], tempura = [], fish_dish = [], meat_dish = [];}



/***search box***/
/*
$(document).ready(function(){
    var resultDropdown = $('.search-box input[type="text"]').siblings(".result");
    $('.search-box input[type="text"]').on("keyup input", function(){
        
        var inputVal = $(this).val();
        if(inputVal.length){           
            $.ajax({
                url: "../db/search.php",
                data: {term_ippin: inputVal},
                success: function(data){
                // Display the returned data in browser
                resultDropdown.html(data)},
                });
        } else{
            resultDropdown.empty();
        }
    });
    
    $('.search-box input[type="text"]', resultDropdown).blur(function(){
        $(this).val('');
        resultDropdown.empty();
    });
    
}); 
*/


function show_items(){
  $("#item_box").toggle();
  $.ajax({
              url: "../db/test.php",
              data: {search_ippin: 'all'},
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
                data: {search_ippin: inputVal},
                success: function(data){
                // Display the returned data in browser
                $(".result").html(data)},
                });
        }else{
            $.ajax({
              url: "../db/test.php",
              data: {search_ippin: 'all'},
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




 //sort and store new order in array
 
//   var sort_items_appetizer = { sortAppetizer: sortAppetizer};
//   var sort_items_tempura = { sortTempura: sortTempura};
//   var sort_items_fish_dish = { sortFishDish: sortFishDish};
//   var sort_items_meat_dish = { sortMeatDish: sortMeatDish};
//    w = 'sortAppetizer', x = 'sortTempura', y = 'sortFishDish', z = 'sortMeatDish';   
//   sort_items_appetizer[w]();
//   sort_items_tempura[x]();
//   sort_items_fish_dish[y]();
//   sort_items_meat_dish[z]();







/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){         
        var item = $(this).attr('id');
        var items = $(this).attr('class');//category
        var position = item.indexOf("-");
        var new_key = item.slice(0, position);//id
        //console.log(new_key, items);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
            //if "No matches found", 
            //$('input[type="text"]').val('');   
            $(this).parent(".result").empty();

        }else if(item == "addall"){
            for(var i = 1; i <24; i++){                
                $.post("../db/items.php", {term_ippin: i}).done(function(data){                        
                    storeInArray(data, appetizer.menu_list, tempura.menu_list, fish_dish.menu_list, meat_dish.menu_list);
                    // sort_items_appetizer[w]();
                    // sort_items_tempura[x]();
                    // sort_items_fish_dish[y]();
                    // sort_items_meat_dish[z]();              
                });
            }
            //call the function 3 sec later to give ajax a time to get all the data
            setTimeout(get_id_and_store_in_array, 3000);
                     
        }else if(item == "empty"){
            
            appetizer.keys = tempura.keys = fish_dish.keys = meat_dish.keys = [], 
            appetizer.menu_list = tempura.menu_list = fish_dish.menu_list = meat_dish.menu_list = [];
            var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
            storeKeyInDb(arrays);
            document.getElementById('appetizer').innerHTML = '';
            document.getElementById('tempura').innerHTML = '';
            document.getElementById('fish_dish').innerHTML = '';
            document.getElementById('meat_dish').innerHTML = '';

            // localStorage.setItem("appetizer", JSON.stringify(appetizer));
            // localStorage.setItem("tempura", JSON.stringify(tempura));
            // localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
            // localStorage.setItem("meat_dish", JSON.stringify(meat_dish));

        }else if(isNaN(new_key) == false && checkId(items, new_key) === true)
        {//add a item to the table
            if (items == 'appetizer'){
                appetizer.keys.push(new_key);
            }else if (items == 'tempura'){
                tempura.keys.push(new_key);
            }else if (items == 'fish_dish'){
                fish_dish.keys.push(new_key);
            }else if (items == 'meat_dish'){
                meat_dish.keys.push(new_key);
            }
             //console.log(stored_key_array_1001, stored_key_array_1002, stored_key_array_1003, stored_key_array_1004);
             var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
             storeKeyInDb(arrays);
        
            $.post("../db/items.php", {term_ippin: new_key}).done(function(data){        
                storeInArray(data, appetizer.menu_list, tempura.menu_list, fish_dish.menu_list, meat_dish.menu_list);
                
                

                // sort_items_appetizer[w]();
                // sort_items_tempura[x]();
                // sort_items_fish_dish[y]();
                // sort_items_meat_dish[z]();
                
            });
            setTimeout(sortAppetizer, 2000);
            setTimeout(sortTempura,2000);
            setTimeout(sortFishDish, 2000);
            setTimeout(sortMeatDish, 2000);
            setTimeout(changeHeight, 2000);
            //clear the text in textbox and search drop down
            //$('input[type="text"]').val('');   
            //$(this).parent(".result").empty();         

        }else{//take out the item
            var checkedId = checkId(items, new_key);
            //console.log(checkedId);
            //if(checkedId == !isNaN())
            //{
                //console.log('matches and taken down')
                alert('This item already exists in the current menu. This item will be removed.');
                //items.splice(checkedId, 1);
                //localStorage.setItem(items, JSON.stringify(items));
                if(items == 'appetizer'){
                    //console.log(appetizer);
                    appetizer.menu_list.splice(checkedId, 1);
                    appetizer.keys.splice(checkedId, 1);
                    //console.log(stored_key_array_1001);
                }
                else if(items == 'tempura'){
                    tempura.menu_list.splice(checkedId, 1);
                    tempura.keys.splice(checkedId, 1);}
                else if(items == 'fish_dish'){
                    fish_dish.menu_list.splice(checkedId, 1);
                    fish_dish.keys.splice(checkedId, 1);
                }
                else if(items == 'meat_dish'){
                    meat_dish.menu_list.splice(checkedId, 1);
                    meat_dish.keys.splice(checkedId, 1);
                }
                else{'We cannot take out the menu'}
                var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
                storeKeyInDb(arrays);
                changeHeight();
                var new_item = document.getElementById(new_key);
                $(new_item).fadeOut("slow", function(){
                    //console.log(new_item);
                    new_item.remove();   
                    
                    // localStorage.setItem("appetizer", JSON.stringify(appetizer));
                    // localStorage.setItem("tempura", JSON.stringify(tempura));
                    // localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
                    // localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
                });

        } 
        $('input[type="text"]').val('');  
        
        
        // console.log(stored_key_arrays);
        // storeKeyInDb(stored_key_arrays);
            
});

//});
// var menu_id;
// function add_all(i){
//     //menu_id = i;
//     $.post("../db/items.php", {term_ippin: counter}).done(function(data){     
//             console.log(i);   
//             sortInArrays(data, i);   
//             storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
//             sort_items_appetizer[w]();
//             sort_items_tempura[x]();
//             sort_items_fish_dish[y]();
//             sort_items_meat_dish[z]();
            
//             });                
// }


function get_id_and_store_in_array(){
    $('#sortable_appetizer li').each(function() {
        appetizer.keys.push(this.id);
        //console.log(stored_key_array_1001);
    });
    $('#sortable_tempura li').each(function() {
        tempura.keys.push(this.id);
        //console.log(stored_key_array_1002);       
    });  
    $('#sortable_fish_dish li').each(function() {
        fish_dish.keys.push(this.id);
        //console.log(stored_key_array_1003);
    });
    $('#sortable_meat_dish li').each(function() {
        meat_dish.keys.push(this.id);
        //console.log(stored_key_array_1004); 
    });
            
    var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
        storeKeyInDb(arrays);
        changeHeight();

}
function storeKeyInDb(array){
    var json_array = JSON.stringify(array);
    console.log(json_array);
    $.ajax({
        url: "../db/store_menu_ippin.php",
        method: "POST",
        data: {term: json_array},
        //success: function(data){
        // Display the returned data in browser
        //console.log(data)
    //},
        });

}



function sortAppetizer(){
    console.log('the function is called');
    $( "#sortable_appetizer").sortable({
        //axis: 'y',
        cursor: "-webkit-grabbing",
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_appetizer');
        appetizer.menu_list = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            appetizer.menu_list.push(test);    
        }
        //console.log(appetizer);
            //localStorage.setItem("appetizer", JSON.stringify(appetizer));
        appetizer.keys = $(this).sortable('toArray', { attribute: 'id' });
        console.log('data: ' + appetizer.keys);
        var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
        storeKeyInDb(arrays);
            }
        }); 
        getDraggables();
       
    }



function sortTempura(){
    $( "#sortable_tempura" ).sortable({
        //axis: 'y',
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_tempura');
        tempura.menu_list = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            tempura.menu_list.push(test);
            
        }
        tempura.keys = $(this).sortable('toArray', { attribute: 'id' });
        console.log('data: ' + tempura.keys);
        var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
        storeKeyInDb(arrays);
        //console.log(tempura);
        //localStorage.setItem("tempura", JSON.stringify(tempura));
        
            }
    });
        getDraggables();
        
};


function sortFishDish(){
    $( "#sortable_fish_dish" ).sortable({
        //axis: 'y',
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_fish_dish');
        fish_dish = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            fish_dish.menu_list.push(test);
            
        }
        fish_dish.keys = $(this).sortable('toArray', { attribute: 'id' });
        console.log('data: ' + fish_dish.keys);
        var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
        storeKeyInDb(arrays);
        //console.log(fish_dish);
        //localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
        
            }
    });
        getDraggables();
      
};


function sortMeatDish(){
    $( "#sortable_meat_dish" ).sortable({
        //axis: 'y',
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_meat_dish');
        meat_dish.menu_list = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            meat_dish.menu_list.push(test);
            
        }
        meat_dish.keys = $(this).sortable('toArray', { attribute: 'id' });
        console.log('data: ' + meat_dish.keys);
        var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
        storeKeyInDb(arrays);
        //console.log(meat_dish);
        //localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
        
            }
    });
        getDraggables();
       
};

function sortInArrays(data, i){
    var obj = [JSON.parse(data)];
    var obj1 = obj[0], key1;

    for(var key in obj1){
        if(obj1.hasOwnProperty(key)){
            key1 = key;
            }
    }
    var item = obj[0][key1];

    if (key1 == 'appetizer'){
        appetizer.keys.push(i);
    }else if (key1 == 'tempura'){
        tempura.keys.push(i);
    }else if (key1 == 'fish_dish'){
        fish_dish.keys.push(i);
    }else if (key1 == 'meat_dish'){
        meat_dish.keys.push(i);
    }
}


function storeInArray(data, appetizer = [], tempura = [], fish_dish = [], meat_dish = []){
    //store feched items in an array and display in table
    //console.log(data);
    //console.log(data);
    var obj = [JSON.parse(data)];
    
    //console.log('obj: ' + obj);
    
    //get the keys
    var obj1 = obj[0], key1;
    //console.log('obj1: ' + obj1);
    //console.log('obj[0]: ' + obj[0]);
    //console.log('key1: ' + key1);
    for(var key in obj1){
        if(obj1.hasOwnProperty(key)){
            //Keys.push(key);
            key1 = key;
            }
    }
    var item = obj[0][key1];
    item = style_origin(item);
     
    if (key1 == 'appetizer'){     
        appetizer.push(item);
        display(key1, appetizer);
        ;
    }else if (key1 == 'tempura'){
        tempura.push(item);
        display(key1, tempura);
       
    }else if (key1 == 'fish_dish'){
        fish_dish.push(item);
         display(key1, fish_dish);
        
    }else if (key1 == 'meat_dish'){
        meat_dish.push(item);
         display(key1, meat_dish);
       
    }else{
        return 'no category';
    }

    /***store data***/
    // localStorage.setItem("appetizer", JSON.stringify(appetizer));
    // localStorage.setItem("tempura", JSON.stringify(tempura));
    // localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
    // localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
    //console.log(JSON.stringify(appetizer));

    //checkSustainability(items);
    //styleLineHeight(items);
    //styleMargin(items);
}

function style_origin(string){
    //style origin if there is any
    var oldOpenParenth = '\(',
    newOpenParenth = "<span style='color:#ccc'>\(",
    oldCloseParenth = ')',
    newCloseParenth = '\)</span>',
    string = string.replace(oldOpenParenth, newOpenParenth).replace(oldCloseParenth, newCloseParenth);
    return string;
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

function checkId(ippinClass, ippinKey) {    
    //console.log('inside checkId');
    //for(var i=0; i<array.length; i++){
        //var ul = document.getElementById("sortable_" + ippinClass);//("'sortable_" + array + "'");
        var div = document.getElementById(ippinClass);
        
        var li = div.getElementsByTagName("li");
        if(0 < li.length){
        for (var i = 0; i < li.length; ++i) {
            var id = li[i].getAttribute('id');
            //console.log(id);
            if(id == ippinKey)
            { return i; }
            }
            {return true; }
            
      }else{ return true; }
   // }
}

/*
$document.ready(function(){
    console.log($('#show_result_ippin').height());
});*/


function changeHeight(){
        console.log($('#show_result_ippin').height());
        var max_height = $('#show_result_ippin').height();

        if(max_height > 980 && max_height < 1129)
        //if(max_height > 980 && max_height < 1080)
        {
            $('#show_result_ippin ul').css({'line-height':'0.8em', 'font-size':'0.9em'});
            $('#show_result_ippin div#gf').css({'padding-top':'3px'});
            $('#show_result_ippin div#gf img#fish').css({'margin-top':'0'});
        }
        else if(max_height > 1130 && max_height < 1179)
        //else if(max_height > 1081 && max_height < 1179) 
        {
            $('#show_result_ippin ul').css({'line-height':'0.5em', 'font-size':'0.9em'});
            $('#show_result_ippin div#gf').css('padding-top', '5px');
            $('#show_result_ippin img#fish').css('margin-top', '0');
        }
        else if(max_height > 1180 && max_height < 1279)
        {
            $('#show_result_ippin ul').css({'line-height':'0.5em', 'font-size':'0.9em'});
            /*$('#menu').addClass('changed_height3');*/
            $('#dates').css('margin', '0 2%');
            $('#ippin').addClass('changed_height3');
            $('#show_result_ippin div#gf').css('padding-top', '5px');
            $('#show_result_ippin img#fish').css('margin-top', '0');

        }else if(max_height > 1280 && max_height < 1400)
        {
            $('#show_result_ippin ul').css({'line-height':'0.5em', 'font-size':'0.8em'});
            /*$('#menu').addClass('changed_height3');*/
            $('#dates').css('margin', '0 2%');
            $('#ippin').addClass('changed_height3');
            $('#show_result_ippin div#gf').css('padding-top', '5px');
            $('#show_result_ippin img#fish').css('margin-top', '0');

        }
}




//a trash can appears when hovering an item
var $trash = $("#trash");
$(document).ready(getDraggables());
function getDraggables(){
    $("#show_result_ippin li").mousedown(function(){
    $trash.addClass("hover");});
    $("#show_result_ippin li").mouseleave(function(){
        $trash.removeClass("hover");
        $trash.droppable({
        accept: "#show_result_ippin li",
        classes: {
            "ui-droppable-active": "ui-state-highlight"
        },
        //over: function(event, ui){
        //    resizeItem(ui.draggable);
        //},
        //out:function(event, ui){
        //   resizeItemBack(ui.draggable);
        //},
        drop: function( event, ui ) {
            deleteImage( ui.draggable );
            //location.reload();
        },
        tolerance: "fit",
        hoverClass: "highlight"
        });
    });

};


//function resizeItem( $item ){
    //$item.addClass("hover");
//    $item.css({"width":"200px", "color":"yellow"})
//}

//function resizeItemBack( $item ){
    //$item.removeClass("hover");
//    $item.css({"width":"90%", "color":"#000"})
//}

function deleteImage(item ) {
    
      var deleteId = item.attr('id');
      var itemCategory = item.closest("div").attr('id'); 

      var checkedId = checkId(itemCategory, deleteId); 
      if(itemCategory == 'appetizer'){
            //console.log(appetizer);
            appetizer.menu_list.splice(checkedId, 1);
            appetizer.keys.splice(checkedId, 1);
            //console.log(stored_key_array_1001);
        }
        else if(itemCategory == 'tempura'){
            tempura.menu_list.splice(checkedId, 1);
            tempura.keys.splice(checkedId, 1);}
        else if(itemCategory == 'fish_dish'){
            fish_dish.menu_list.splice(checkedId, 1);
            fish_dish.keys.splice(checkedId, 1);
        }
        else if(itemCategory == 'meat_dish'){
            meat_dish.menu_list.splice(checkedId, 1);
            meat_dish,keys.splice(checkedId, 1);
        }
        else{'We cannot take out the menu'}
        var arrays = [appetizer.keys, tempura.keys, fish_dish.keys, meat_dish.keys];
        storeKeyInDb(arrays);
            
        // if(itemCategory == 'appetizer'){appetizer.splice(checkedId, 1);}               
        // else if(itemCategory == 'tempura'){tempura.splice(checkedId, 1);}
        // else if(itemCategory == 'fish_dish'){fish_dish.splice(checkedId, 1);}
        // else if(itemCategory == 'meat_dish'){meat_dish.splice(checkedId, 1);}
        // else{'We cannot take out the menu'}
        // localStorage.setItem("appetizer", JSON.stringify(appetizer));
        // localStorage.setItem("tempura", JSON.stringify(tempura));
        // localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
        // localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
       //console.log(appetizer);
       item.fadeOut().remove();
       $trash.removeClass("hover");
       changeHeight();
    }

/*
function print(){
    location.reload();
    window.print();
}
*/