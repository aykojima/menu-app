//var items = [];

/***get Today's date**/

changeDate("today");

function changeDate(id){
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";

    var n = weekday[today.getDay()];
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 
    else if(mm<10) {
        mm = '0'+mm
    } 
    if(id == "today")
    {
        n = weekday[today.getDay()];
        dd = today.getDate();
        console.log(n);
    }else if(id == "left")
    {
        n = weekday[today.getDay()];
        dd = today.getDate();
    }else if(id == "right")
    {
        if(today.getDay() < 6)
        {n = weekday[today.getDay() + 1];}
        else{n = weekday[0];}
        dd = today.getDate() + 1;
    }
    
    today = n + ' ' + mm + ' .' + dd + ' .' + yyyy;
    console.log(today);
    document.getElementById("dates").innerHTML = today;
}





/***search-box***/
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){           
            $.ajax({
                url: "db/search.php",
                data: {term: inputVal},
                success: function(data){
                // Display the returned data in browser
                resultDropdown.html(data)},
                });
        } else{
            resultDropdown.empty();
        }
    });
}); 


/***caching the menu array***/
var stored = localStorage['myKey'];
if (stored) {
    items = JSON.parse(stored);
    //console.log(items);
    document.getElementById("showResult").innerHTML = displayResult(items);
    checkSustainability(items);
    styleMenu(items);
    //checkSustainability(items);
    }
else  {items = [];}

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
        }else if(checkId(items, item) === true)
        {//add a item to the table                 
            $.post("db/items.php", {term: item}).done(function(data){    
            storeInArray(data);
            });
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else{//take out the item
            var checkedId = checkId(items, item)
            console.log(checkedId);
            items.splice(checkedId, 1);
            localStorage['myKey'] = JSON.stringify(items);
            location.reload();
        } 
          
});


function storeInArray(data){
    //store feched items in an array and display in table
    items.push(data);
    items.sort();
    localStorage['myKey'] = JSON.stringify(items);
    document.getElementById("showResult").innerHTML = displayResult(items);
    checkSustainability(items);
    styleMenu(items);
}

function displayResult(array){
        var item='';
        for(i=0;i<array.length;i++)
            {
                item += "<tr class='tableRow'>" + array[i] + "</tr>\n"; 
            }
            //console.log(item);
        return item;
        
    }

function checkSustainability(array){
    var img = "<img src='images/fish.png' alt='fish' style=width:15px;>";
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
        console.log(id);
            if(id == sushiKey)
            { return i; }
        }
         return true;
}

function styleMenu(array){
    var dates = document.getElementById('dates');
    var sushiBar = document.getElementById('sushiBar');
    var tr = document.getElementsByClassName('tableRow');
    console.log(tr);
    if(array.length >= 34 && array.length<=35)
    {//this can hold up to 43 items
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        for(var i=0; i<tr.length; i++)
        {
            tr[i].className = "lineHeight34";
        }
    }else if(array.length >= 36 && array.length<=37)
    {//this can hold up to 43 items
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        for(var i=0; i<tr.length; i++)
        {
            tr[i].className = "lineHeight36";
        }
    }else if(array.length >= 38 && array.length<=39)
    {//this can hold up to 43 items
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        for(var i=0; i<tr.length; i++)
        {
            tr[i].className = "lineHeight38";
        }
    }else if(array.length >= 40 && array.length<=41)
    {//this can hold up to 43 items
        //dates.className ='NoMargin';
        //sushiBar.className ='NoMargin';
        for(var i=0; i<tr.length; i++)
        {
            tr[i].className = "lineHeight40";
        }
    }else if(array.length >= 42)
    {//this can hold up to 46 items
        dates.className ='NoMargin';
        sushiBar.className ='NoMargin';
        for(var i=0; i<tr.length; i++)
        {
            tr[i].className = "lineHeight42";
        }
    }
}
