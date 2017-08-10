/***search-box***/
/*
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
       
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
*/

 $(document).on("click", ".edit", function(event){ 
        var item_id = $(this).attr('id');
        var position = item_id.indexOf("-");
        var item = item_id.slice(0, position);

        console.log(item);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item !== isNaN()){
          //add a item to the table 
          $.post("../db/edit_ippin.php", {term_ippin: item}).done(function(data){
            //JSON.parse(data);  
            edit_display(JSON.parse(data));
            });
          
        }else{console.log('not able to get the data')}     
});


function edit_display(array){
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

        
$(function () {
        
        $('form').on('submit', function (e) {
        var items = $(this).attr('class');
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '../db/edit_ippin.php',
            data: $('form').serialize(),
            success: function (data) {
            
                alert('Edited successfully');

                var position = data.indexOf("-");
                var int_data = parseInt(data.slice(0, position));   
                var items = data.slice(position + 1, -1).trim();
                console.log(items);

            //var int_data = parseInt(data);
            var checkedId = checkId(items, int_data);
            if (checkedId == true){
                $.post("../db/items.php", {term_ippin: int_data}).done(function(data){
                    storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
                    sort_items_appetizer[w]();
                    sort_items_tempura[x]();
                    sort_items_fish_dish[y]();
                    sort_items_meat_dish[z]();            
                });

            }else{
                if(items == 'appetizer'){
                    //console.log(appetizer);
                    appetizer.splice(checkedId, 1);
                    //console.log(appetizer);
                }else if(items == 'tempura'){tempura.splice(checkedId, 1);}
                else if(items == 'fish_dish'){fish_dish.splice(checkedId, 1);}
                else if(items == 'meat_dish'){meat_dish.splice(checkedId, 1);}
                else{'We cannot take out the menu'}
                localStorage.setItem("appetizer", JSON.stringify(appetizer));
                localStorage.setItem("tempura", JSON.stringify(tempura));
                localStorage.setItem("fish_dish", JSON.stringify(fish_dish));
                localStorage.setItem("meat_dish", JSON.stringify(meat_dish));


    
                var new_item = document.getElementById(int_data);            
                new_item.remove();   

                $.post("../db/items.php", {term_ippin: int_data}).done(function(data){
                    storeInArray(data, appetizer, tempura, fish_dish, meat_dish);
                    sort_items_appetizer[w]();
                    sort_items_tempura[x]();
                    sort_items_fish_dish[y]();
                    sort_items_meat_dish[z]();            
                });
            }



            hide_edit_div();
            $('input[type="text"]').val('');  
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
      });