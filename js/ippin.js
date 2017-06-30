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
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
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
}); 


/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){         
        var item = $(this).attr('id');
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
            //if "No matches found", 
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();

        }else if(item == "addall"){
            for(var i = 1; i <23; i++){
            $.post("db/items_test.php", {term_ippin: i}).done(function(data){           
                storeInArray(data);
            }); 
        }
            //items.forEach(function(item) {
              //  storeInArray(item);
            //});
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();                       
        }else if(item == "empty"){
            items = [];
            localStorage['ippins'] = JSON.stringify(items);
            document.getElementById("showResult").innerHTML = '';
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else if(isNaN(item) == false) //&& checkId(items, item) === true)
        {//add a item to the table                 
            $.post("db/items_test.php", {ippin_term: item}).done(function(data){
            storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
            });
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else{//take out the item
            var checkedId = checkId(items, item)
            //console.log(checkedId);
            items.splice(checkedId, 1);
            localStorage['ippins'] = JSON.stringify(items);
            location.reload();
        } 
          
});

function storeInArray(data, appetizer = [], tempura = [], fish_dish = [], meat_dish = []){
    //store feched items in an array and display in table
    var obj = [JSON.parse(data)];
    console.log(obj);
    
    //get the keys
    var obj1 = obj[0], key1;
    for(var key in obj1){
        if(obj1.hasOwnProperty(key)){
            //Keys.push(key);
            key1 = key;
            }
    }
    var item = obj[0][key1];
    
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
    console.log(JSON.stringify(appetizer));

    //checkSustainability(items);
    //styleLineHeight(items);
    //styleMargin(items);
}


function display(key, array){
    var string ='';
    for(i=0; i < array.length; i++)
        {
                string +=array[i];
        }  
        document.getElementById(key).innerHTML = string;
}

$( function() {
    $( "#2" ).draggable({ axis: "y" });
});

function checkId(array, ippinKey) {    
    for(var i=0; i<array.length; i++){
        var id = document.getElementById("IppinKey").rows[i].cells[3].getAttribute('id');
        console.log(id);
            if(id == ippinKey)
            { return i; }
        }
         return true;
}