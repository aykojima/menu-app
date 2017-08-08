/***search-box***/
$(document).ready(function(){
    var resultDropdown = $('.search-box input[type="text"]').siblings(".result");
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        if(inputVal.length){           
            $.ajax({
                url: "../db/search.php",
                data: {term: inputVal},
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


/***caching the menu array***/
var stored = localStorage['myKey'];
if (stored) {
    items = JSON.parse(stored);
    //console.log(items);
    document.getElementById("showResult").innerHTML = displayResult(items);
    checkSustainability(items);
    assignClass(items);
    styleLineHeight(items);
    styleMargin(items);

    //checkSustainability(items);
    }
else  {var items = [];}

/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){ 
     
        //var item = $(this).text();//clicked item (e.g. Albacore Tuna)
        var item = $(this).attr('id');
        //console.log(item);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
        //if "No matches found", 
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else if(item == "addall"){
            console.log("clicked");
            for(var i = 1; i <31; i++){
            $.post("../db/items.php", {term: i}).done(function(data){           
            //items = JSON.parse(data);
            //console.log(items.length);
            //for(var i = items.length -1 ; i >= 0; --i){
                //console.log(element);
                storeInArray(data);
            //}
            }); 
        }
            //console.log(items);
            //items.forEach(function(item) {
              //  storeInArray(item);
            //});
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();     
                    
        }else if(item == "empty"){
            console.log("emptied")
            items = [];
            localStorage['myKey'] = JSON.stringify(items);
            document.getElementById("showResult").innerHTML = '';
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else if(isNaN(item) == false && checkId(items, item) === true)
        {//add a item to the table                 
            $.post("../db/items.php", {term: item}).done(function(data){
            //console.log(items);    
            storeInArray(data);
            getDraggables();
            });
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else{//take out the item
            
            var checkedId = checkId(items, item)
            alert('This item already exists in the current menu. This item will be removed.');
            //console.log(checkedId);
            items.splice(checkedId, 1);
            
            console.log(items);
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();

            var new_item = document.getElementById(item);
            
            new_item.remove();   
            localStorage['myKey'] = JSON.stringify(items);
            console.log('item fades out');
            styleLineHeight(items);
            //location.reload();
        } 
          
});


function storeInArray(data){
    //store feched items in an array and display in table
    items.push(data);
    items.sort();
    //console.log(items);
    localStorage['myKey'] = JSON.stringify(items);
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
            //console.log(item);
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
        //console.log(id);
        row[i].id = id;
        }
}

function styleLineHeight(array){
    //var tr = document.getElementsByTagName("tr");
    var table = document.getElementById("showResult");
    console.log(table);
    if(array.length >= 34 && array.length<=36)
    {//this can hold up to 39 items
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        for (var i = array.length -1 ; i >= 0; --i)
        {
            //tr[i].className = "lineHeight34";
            table.className = "lineHeight34";
        }
    }else if(array.length >= 37 && array.length<=38)
    {//this can hold up to 42 items
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        for (var i = array.length -1 ; i >= 0; --i)
        {
            //tr[i].className = "lineHeight40";
            table.className = "lineHeight37";
        }
    }else if(array.length >= 39 && array.length<=41)
    {//this can hold up to 44 items
        for (var i = array.length -1 ; i >= 0; --i)
        {   
            //tr[i].className = "lineHeight40";
            table.className = "lineHeight39";
        }
    }else if(array.length >= 42 && array.length<=44)
    {//this can hold up to 46 items
        for (var i = array.length -1 ; i >= 0; --i)
        {
            //tr[i].className = "lineHeight44";
            table.className = "lineHeight42";
        }
    }else if(array.length >= 45)
    {//this can hold up to 46 items
        for (var i = array.length -1 ; i >= 0; --i)
        {
            //tr[i].className = "lineHeight42";
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
//});
}

var trash = $("#trash");
$(document).ready(function(){
    
    $("#showResult tr.draggable").mousedown(function(){
    trash.addClass("hover");
    });
    //$("#showResult tr#draggable").mouseleave(function(){
    //$trash.removeClass("hover");
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
          //var id = ui.draggable.cells[3].getAttribute('id');
        //console.log(id);
        
        deleteItem( ui.draggable );
      },
      tolerance: "fit",
      hoverClass: "highlight"

    });
    
});
//});




function deleteItem( item ) {
   
      var itemClass = item.attr("id");
      console.log(itemClass);
      var checkedId = checkId(items, itemClass);
      console.log(checkedId);
      items.splice(checkedId, 1);
      localStorage['myKey'] = JSON.stringify(items);
      console.log(item);
      item.fadeOut().remove();   
      
      styleLineHeight(items);
      trash.removeClass("hover");
        
    }

$(document).ready(function(){
    console.log(items.length);
});