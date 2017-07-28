/***caching the menu array***/

var stored_app = localStorage.getItem("appetizer");
var stored_temp = localStorage.getItem("tempura");
var stored_fish = localStorage.getItem("fish_dish");
var stored_meat = localStorage.getItem("meat_dish");

if (stored_app || stored_temp || stored_fish || stored_meat === true) {
    appetizer = JSON.parse(stored_app);
    console.log(appetizer);
    tempura = JSON.parse(stored_temp);
    fish_dish = JSON.parse(stored_fish);
    meat_dish = JSON.parse(stored_meat);

    display("appetizer", appetizer);
    display("tempura", tempura);
    display("fish_dish", fish_dish);
    display("meat_dish", meat_dish);
    }
else  {var appetizer = [], tempura = [], fish_dish = [], meat_dish = [];}



/***search box***/
$(document).ready(function(){
    var resultDropdown = $('.search-box input[type="text"]').siblings(".result");
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        if(inputVal.length){           
            $.ajax({
                url: "db/search.php",
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


 //sort and store new order in array
  var sort_items_appetizer = { sortAppetizer: sortAppetizer};
  var sort_items_tempura = { sortTempura: sortTempura};
  var sort_items_fish_dish = { sortFishDish: sortFishDish};
  var sort_items_meat_dish = { sortMeatDish: sortMeatDish};
   w = 'sortAppetizer', x = 'sortTempura', y = 'sortFishDish', z = 'sortMeatDish';   
  sort_items_appetizer[w]();
  sort_items_tempura[x]();
  sort_items_fish_dish[y]();
  sort_items_meat_dish[z]();






/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){         
        var item = $(this).attr('id');
        var items = $(this).attr('class');
        console.log(items);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
            //if "No matches found", 
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();

        }else if(item == "addall"){
            for(var i = 1; i <23; i++){
            $.post("db/items.php", {term_ippin: i}).done(function(data){     
                //console.log(data);      
                storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
            sort_items_appetizer[w]();
            sort_items_tempura[x]();
            sort_items_fish_dish[y]();
            sort_items_meat_dish[z]();
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
            //items = [];
            appetizer = [], tempura = [], fish_dish = [], meat_dish = [];
            console.log(appetizer);
            localStorage.setItem("appetizer", JSON.stringify(appetizer));
            localStorage.setItem("tempura", JSON.stringify(tempura));
            localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
            localStorage.setItem("meat_dish", JSON.stringify(meat_dish));

            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();

            location.reload();
        }else if(isNaN(item) == false && checkId(items, item) === true)
        {//add a item to the table                 
            $.post("db/items.php", {term_ippin: item}).done(function(data){
            storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
            sort_items_appetizer[w]();
            sort_items_tempura[x]();
            sort_items_fish_dish[y]();
            sort_items_meat_dish[z]();

            var change_height = function changeHeight(){
                console.log($('#show_result_ippin').height());
                var max_height = $('#show_result_ippin').height();
                if(max_height > 1000 && max_height < 1149)
                {
                    $('#show_result_ippin ul').css({'line-height':'0.6em'});
                }
                else if(max_height > 1150 && max_height < 1199)
                {
                    $('#show_result_ippin ul').css({'line-height':'0.5em', 'font-size':'0.9em'});
                    $('#show_result_ippin div#gf').css('padding-top', '5px');
                    $('#show_result_ippin img#fish').css('margin-top', '0');
                }
                else if(max_height > 1200 && max_height < 1300)
                {
                    $('#show_result_ippin ul').css({'line-height':'0.6em'});
                    /*$('#menu').addClass('changed_height3');*/
                    $('#dates').css('margin', '0 2%');
                    $('#ippin').addClass('changed_height3');
                    $('#show_result_ippin div#gf').css('padding-top', '5px');
                    $('#show_result_ippin img#fish').css('margin-top', '0');

                }
            }();
         });
        
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
             





        }else{//take out the item
            var checkedId = checkId(items, item);
            if(checkedId == !isNaN())
            {
                alert('This item already exists in the current menu. This item will be removed.');
                if(items == 'appetizer'){
                    console.log(appetizer);
                    appetizer.splice(checkedId, 1);
                    console.log(appetizer);}
                else if(items == 'tempura'){tempura.splice(checkedId, 1);}
                else if(items == 'fish_dish'){fish_dish.splice(checkedId, 1);}
                else if(items == 'meat_dish'){meat_dish.splice(checkedId, 1);}
                else{'We cannot take out the menu'}
                localStorage.setItem("appetizer", JSON.stringify(appetizer));
                localStorage.setItem("tempura", JSON.stringify(tempura));
                localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
                localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
                location.reload();
            }
        } 
          
});

//});

function sortAppetizer(){
    $( "#sortable_appetizer").sortable({
        //axis: 'y',
        cursor: "-webkit-grabbing",
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_appetizer');
        appetizer = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            appetizer.push(test);    
        }
        //console.log(appetizer);
        localStorage.setItem("appetizer", JSON.stringify(appetizer));
        
            }
        }); 
    };



function sortTempura(){
    $( "#sortable_tempura" ).sortable({
        //axis: 'y',
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_tempura');
        tempura = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            tempura.push(test);
            
        }
        //console.log(tempura);
        localStorage.setItem("tempura", JSON.stringify(tempura));
        
            }
    });
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
            fish_dish.push(test);
            
        }
        //console.log(fish_dish);
        localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
        
            }
    });
};


function sortMeatDish(){
    $( "#sortable_meat_dish" ).sortable({
        //axis: 'y',
        revert:true,
        update: function (event, ui) {
        var list = document.getElementById('sortable_meat_dish');
        meat_dish = [];
        var another_test = list.childNodes; 
        for(var i =0; i < list.childNodes.length; i++)
        {
            var list_id = another_test[i].id;
            //console.log(list_id);
            var test = "<li id='" + list_id + "' class='sortable'>" + another_test[i].innerHTML + "</li>"
            meat_dish.push(test);
            
        }
        //console.log(meat_dish);
        localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
        
            }
    });
};


function storeInArray(data, appetizer = [], tempura = [], fish_dish = [], meat_dish = []){
    //store feched items in an array and display in table
    console.log(data);
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
    console.log(item);
//style origin if there is any
    var oldOpenParenth = '\(',
    newOpenParenth = "<span style='color:#ccc'>\(",
    oldCloseParenth = ')',
    newCloseParenth = '\)</span>',
    item = item.replace(oldOpenParenth, newOpenParenth).replace(oldCloseParenth, newCloseParenth);
    console.log(item);
    
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
    localStorage.setItem("appetizer", JSON.stringify(appetizer));
    localStorage.setItem("tempura", JSON.stringify(tempura));
    localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
    localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
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

function checkId(ippinClass, ippinKey) {    
    //for(var i=0; i<array.length; i++){
        //var ul = document.getElementById("sortable_" + ippinClass);//("'sortable_" + array + "'");
        var div = document.getElementById(ippinClass);
        
        var li = div.getElementsByTagName("li");
        if(0 < li.length){
        for (var i = 0; i < li.length; ++i) {
            var id = li[i].getAttribute('id');
            console.log(id);
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

var change_height = function changeHeight(){
                console.log($('#show_result_ippin').height());
                var max_height = $('#show_result_ippin').height();
                if(max_height > 980 && max_height < 1129)
                {
                    $('#show_result_ippin ul').css({'line-height':'0.8em', 'font-size':'0.9em'});
                    $('#show_result_ippin div#gf').css({'padding-top':'3px'});
                    $('#show_result_ippin div#gf img#fish').css({'margin-top':'0'});
                }
                else if(max_height > 1130 && max_height < 1179)
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
            }();




//a trash can appears when hovering an item
var $trash = $("#trash");
$(document).ready(function(){
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
});


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
        if(itemCategory == 'appetizer'){appetizer.splice(checkedId, 1);}               
        else if(itemCategory == 'tempura'){tempura.splice(checkedId, 1);}
        else if(itemCategory == 'fish_dish'){fish_dish.splice(checkedId, 1);}
        else if(itemCategory == 'meat_dish'){meat_dish.splice(checkedId, 1);}
        else{'We cannot take out the menu'}
        localStorage.setItem("appetizer", JSON.stringify(appetizer));
        localStorage.setItem("tempura", JSON.stringify(tempura));
        localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
        localStorage.setItem("meat_dish", JSON.stringify(meat_dish));
       //console.log(appetizer);
       item.fadeOut().remove();
    }

/*
function print(){
    location.reload();
    window.print();
}
*/