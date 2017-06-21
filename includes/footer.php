</div>
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
    }
else  {items = [];}

/***fetch the clicked item in the search box and store it in an array***/
 $(document).on("click", ".result p", function(event){ 
        var item = $(this).text();//clicked item (e.g. Albacore Tuna)
        //clear the text in textbox and search drop down
        $('input[type="text"]').val('');   
        $(this).parent(".result").empty();
        //ajax        
        $.post("db/items.php", {term: item}).done(function(data){    

        storeInArray(data);
        });       
    });


function storeInArray(data){
    //store feched items in an array and display in table
    items.push(data);
    items.sort();
    localStorage['myKey'] = JSON.stringify(items);
    document.getElementById("showResult").innerHTML = displayResult(items);
}

function displayResult(array){
        var item='';
        for(i=0;i<array.length;i++)
            {
                item += array[i] + "<br>"; 
            }
        return item;
        
    }
</script>
</body>
</html>