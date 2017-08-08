/***search-box***/
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
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
            $.post("../db/edit_ippin.php", {term_ippin: item}).done(function(data){
            //JSON.parse(data);  
            display(JSON.parse(data));
            });
            $('input[type="text"]').val('');   
            $(this).parent(".result").empty();
        
        }     
});

function display(array){
    array.forEach(function(a){
        document.getElementById('ippin_key').value = a['IppinKey'];
        document.getElementById('name').value = a['IppinName'];
        var item_category = a['Category'];
        var drop_down = document.getElementById('category');
        if(item_category == 'appetizer')
        {drop_down.selectedIndex = 0;}
        else if(item_category == 'tempura')
        {drop_down.selectedIndex = 1;}
        else if(item_category == 'fish_dish')
        {drop_down.selectedIndex = 2;}
        else if(item_category == 'meat_dish')
        {drop_down.selectedIndex = 3;}
        else{console.log('no such category');}

        document.getElementById('price').value = a['IppinPrice'];
        if(a['Sustainability'] == 1)
        {
            document.getElementById("sustainability").checked = true;
        }else
        {
            document.getElementById("sustainability").checked = false;
        }
        if(a['GF'] == 1)
        {
            document.getElementById("gf").checked = true;
        }
        else
        {
            document.getElementById("gf").checked = false;
        }
    });
    
}

        
