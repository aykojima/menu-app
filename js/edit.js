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

 $(document).on("click", ".result p", function(event){ 
        var item = $(this).attr('id');
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item == "nomatch"){
        //if "No matches found", 
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        }else
        {//add a item to the table                 
            $.post("db/edit.php", {term: item}).done(function(data){
            //JSON.parse(data);  
            display(JSON.parse(data));
            });
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        
        }     
});

function display(array){
    array.forEach(function(a){
        document.getElementById('sushi_key').value = a['SushiKey'];
        document.getElementById('name').value = a['SushiName'];
        document.getElementById('origin').value = a['Origin'];
        document.getElementById('sushiPrice').value = a['SushiPrice'];
        document.getElementById('sashimiPrice').value = a['SashimiPrice'];
        if(a['Sustainability'] == 1)
        {
            document.getElementById("sustainability").checked = true;
        }
    });
    
}
