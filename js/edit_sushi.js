/***search-box***/
 $(document).on("click", ".edit", function(event){ 
        var item_id = $(this).attr('id');
        var position = item_id.indexOf("-");
        var item = item_id.slice(0, position);

        console.log(item);
        //check if the item already exists in the table
        //return true if it's new, false if it already exists
        if(item !== isNaN()){
          //add a item to the table 
          $.post("../db/edit_sushi.php", {term: item}).done(function(data){
            //JSON.parse(data);  
            display(JSON.parse(data));
            });
          
        }else{console.log('not able to get the data')}     
});



function display(array){
    array.forEach(function(a){
        document.getElementById('sushi_key').value = a['SushiKey'];
        document.getElementById('name').value = a['SushiName'];
        var origin = a['Origin'];
        origin = origin.slice(1, -1);
        document.getElementById('origin').value = origin;
        document.getElementById('sushiPrice').value = a['SushiPrice'];
        document.getElementById('sashimiPrice').value = a['SashimiPrice'];
        if(a['Sustainability'] == 1)
        {
            document.getElementById("sustainability").checked = true;
        }
    });
    
}


function calcSashimi(){
    var sushiP = document.getElementById('sushiPrice').value;
    console.log(sushiP);
    var newSashimiP = 0;
    if(sushiP == ""){
            document.getElementById('sashimiPrice').value = null;
    }else if(isNaN(sushiP) === false){           
            newSashimiP = sushiP * 2;
            console.log(newSashimiP);
            document.getElementById('sashimiPrice').value = newSashimiP;
    }else{
            document.getElementById('sashimiPrice').value = 'Please enter number';
    }
}
        

 $(function () {
        $('form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '../db/edit_sushi.php',
            data: $('form').serialize(),
            success: function (data) {
            
              alert('Edited successfully');
            var int_data = parseInt(data);
            var checkedId = checkId(items, int_data);
            if (checkedId == true){
                $.post("../db/items.php", {term: int_data}).done(function(data){   
                    storeInArray(data);
                    getDraggables();
                });
            }else{
                items.splice(checkedId, 1);          
                var new_item = document.getElementById(int_data);            
                new_item.remove();   
                //localStorage['myKey'] = JSON.stringify(items);

                $.post("../db/items.php", {term: int_data}).done(function(data){   
                    storeInArray(data);
                    getDraggables();
                });
            }
            styleLineHeight(items);



            hide_edit_div();
            $('input[type="text"]').val('');  
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
      });