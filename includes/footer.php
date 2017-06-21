</div>
<a href="javascript:window.print()">Print</a>
<script type="text/javascript">
//var items = [];

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
    console.log(items);
    document.getElementById("showResult").innerHTML = displayResult(items);
    checkSustainability(items);
    //checkSustainability(items);
    }
else  {items = [];}

/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){ 
        //var item = $(this).text();//clicked item (e.g. Albacore Tuna)
        var item = $(this).attr('id');
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(checkId(items, item) == true)
        {//add a item to the table                 
            $.post("db/items.php", {term: item}).done(function(data){    
            storeInArray(data);
            });
            //clear the text in textbox and search drop down
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else       
        {//take out the item
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
}

function displayResult(array){
        var item='';
        for(i=0;i<array.length;i++)
            {
                item += "<tr>" + array[i] + "</tr>\n"; 
            }
            //console.log(item);
        return item;
        
    }

function checkSustainability(array){
    var img = "<img src='images/fish.png' alt='fish' style=width:10px;>";
    //img.src = 'images/fish.png';
    console.log(img);
    for(var i=0; i<array.length; i++){
        var id = document.getElementById("showResult").rows[i].cells[4].getAttribute('id');
            if(id == 1 )
            {
                document.getElementById("showResult").rows[i].cells[0].innerHTML = img;
            } 
        } 
}
function checkId(array, sushiKey) {
    
    for(var i=0; i<array.length; i++){
        var id = document.getElementById("showResult").rows[i].cells[3].getAttribute('id');
        console.log(id);
            if(id == sushiKey)
            {
                return i;
            } 
        }
         return true;
}

</script>
</body>
</html>