function show_items(){
  $("#item_box").toggle();
  $.ajax({
              url: "../db/test.php",
              data: {search: 'all'},
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
                data: {search: inputVal},
                success: function(data){
                // Display the returned data in browser
                $(".result").html(data)},
                });
        }else{
            $.ajax({
              url: "../db/test.php",
              data: {search: 'all'},
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



var items = [];
var stored_key_array = [];
//on page load, get stored_key_array stored in db
$(document).ready(function(){
    $.ajax({
              url: "../db/store_menu.php",
              //data: {search: 'all'},
              success: function(data){
                stored_key_array = JSON.parse(data);
                stored_key_array.forEach(function(element) {
                    //console.log(element);
                    $.post("../db/items.php", {term: element}).done(function(data){  
                        storeInArray(data);
                        getDraggables();
                    });
                }, this);
                
              }
            });
            
});


/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){ 
        //get id from searched item to get an item from db
        var item = $(this).attr('id');
        var position = item.indexOf("-");
        var new_key = item.slice(0, position);

        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
            //if "No matches found", 
            $(this).parent(".result").empty();




        }else if(item == "addall"){
            //to add 30 items to get started
            for(var i = 1; i <31; i++){
                stored_key_array.push(i);
                console.log(stored_key_array);
                storeKeyInDb(stored_key_array);
                $.post("../db/items.php", {term: i}).done(function(data){                     
                    storeInArray(data);
            }); 
        }           
            $(this).parent(".result").empty();     



        }else if(item == "empty"){
            //to empty the menu on the web and in db
            stored_key_array = [];
            storeKeyInDb(stored_key_array);
            items = [];
            //localStorage['myKey'] = JSON.stringify(items);
            document.getElementById("showResult").innerHTML = '';            
            $(this).parent(".result").empty();




        }else if(isNaN(new_key) == false && checkId(items, new_key) === true)
        {//add a item to the table
            stored_key_array.push(new_key);
            storeKeyInDb(stored_key_array);   
            $.post("../db/items.php", {term: new_key}).done(function(data){   
                storeInArray(data);
                getDraggables();
            });



        }else{//take out the item           
            var checkedId = checkId(items, new_key)
            alert('This item already exists in the current menu. This item will be removed.');
            items.splice(checkedId, 1);
            var index_of_new_key = stored_key_array.indexOf(new_key);
            stored_key_array.splice(index_of_new_key, 1);
            storeKeyInDb(stored_key_array);  
            
            var new_item = document.getElementById(new_key);           
            $(new_item).fadeOut("slow", function(){
                new_item.remove();   
                //localStorage['myKey'] = JSON.stringify(items);
            });               
            styleLineHeight(items);           
        }
        //empty the search box
        $('input[type="text"]').val('');  
          
});

function storeKeyInDb(stored_key_array){
    var string_stored_key_array = JSON.stringify(stored_key_array);
    $.ajax({
        url: "../db/store_menu.php",
        data: {term: string_stored_key_array},
        // success: function(data){
        // // Display the returned data in browser
        // console.log(data)},
        });

}

function storeInArray(data){
    //store feched items in an array and display in table
    items.push(data);
    console.log(items.length);
    items.sort();
    // localStorage['myKey'] = JSON.stringify(items);
    document.getElementById("showResult").innerHTML = displayResult(items);
    checkSustainability(items);
    assignClass(items);
    styleLineHeight(items);
    styleMargin(items);
}

function displayResult(array){
        var item='';
        for(i=0;i<array.length;i++)
            {
                item += "<tr class='draggable'>" + array[i] + "</tr>\n"; 
            }
        return item;      
    }

function checkSustainability(array){
    var img = "<img src='../images/fish.jpg' alt='fish' style=width:15px;>";
    for(var i=0; i<array.length; i++){
        var id = document.getElementById("showResult").rows[i].cells[5].getAttribute('id');
            if(id == 1 )
            {
                document.getElementById("showResult").rows[i].cells[0].innerHTML = img;
            } 
        } 
        return true;
}
function checkId(array, sushiKey) {
    
    for(var i=0; i<array.length; i++){
        var id = document.getElementById("showResult").rows[i].cells[3].getAttribute('id');   
            if(id == sushiKey)
            { return i; }
        }
         return true;
}

function assignClass(array) {    
    var row =  document.getElementsByTagName("tr");
    for(var i=0; i<array.length; i++){
            var id = document.getElementById("showResult").rows[i].cells[3].getAttribute('id');
            row[i].id = id;
        }
}

function styleLineHeight(array){

    var table = document.getElementById("showResult");

    if(array.length >= 34 && array.length<=36)
    {//this can hold up to 36 items

        for (var i = array.length -1 ; i >= 0; --i)
        {
            table.className = "lineHeight34";
        }
    }else if(array.length >= 37 && array.length<=38)
    {//this can hold up to 38 items

        for (var i = array.length -1 ; i >= 0; --i)
        {

            table.className = "lineHeight37";
        }
    }else if(array.length >= 39 && array.length<=41)
    {//this can hold up to 41 items
        for (var i = array.length -1 ; i >= 0; --i)
        {   
            table.className = "lineHeight39";
        }
    }else if(array.length >= 42 && array.length<=44)
    {//this can hold up to 44 items
        for (var i = array.length -1 ; i >= 0; --i)
        {
            table.className = "lineHeight42";
        }
    }else if(array.length >= 45)
    {//more than 45 items
        for (var i = array.length -1 ; i >= 0; --i)
        {
            table.className = "lineHeight45";
        }
    }
}

function styleMargin(array){
    var dates = document.getElementById('dates');
    var sushiBar = document.getElementById('sushiBar');

    if(array.length >= 43)
    {
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        /*
        if(document.getElementById('menu_up') == 'null')
        {
            console.log(document.getElementById('menu_up'));
            var div = document.getElementById('menu');
            div.id ='menu_up';
            console.log(div.id)
        }
        */
    }
}


$(document).ready(getDraggables());
    function getDraggables(){
        $("#showResult tr.draggable").draggable({
            revert: "invalid",
            cursor: "-webkit-grabbing",
            helper:"clone",
        });
}

var trash = $("#trash");
$(document).ready(function(){
    
    $("#showResult tr.draggable").mousedown(function(){
    trash.addClass("hover");
    });
    trash.droppable({
      accept: "#showResult tr.draggable",
      classes: {
        "ui-droppable-active": "ui-state-highlight"
      },
      activate:function(event, ui){
        trash.addClass("hover");
      },
      deactivate:function(event, ui){
        trash.removeClass("hover");
      },
      drop: function( event, ui ) {
        
        deleteItem( ui.draggable );
      },
      tolerance: "fit",
      hoverClass: "highlight"

    });
    
});




function deleteItem( item ) {
      var itemClass = item.attr("id");
      var checkedId = checkId(items, itemClass);
      items.splice(checkedId, 1);
      var index_of_new_key = stored_key_array.indexOf(new_key);
      stored_key_array.splice(index_of_new_key, 1);
      storeKeyInDb(stored_key_array);  
      //localStorage['myKey'] = JSON.stringify(items);
      item.fadeOut().remove();   
      
      styleLineHeight(items);
      trash.removeClass("hover");
        
    }
