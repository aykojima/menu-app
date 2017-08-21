$(document).ready(function(){
    $("div#menu ul").css("list-style", "none");
    $("div#menu").css("padding-left", "0");
    $("div#menu h2").css({"padding": "0", "float": "left", "margin": "0"});
    $("div#menu h1").css({"padding-left": "0", "float": "none", "margin-left": "0", "padding-top":"10px"});
    $("div#tonkatsu h1").css("margin-bottom", "0");
    $("div#tonkatsu p.name").css("margin-bottom", "3px");

    $("div.lunch_menu").css({"clear": "both"});
    $("div.additionals p.name").css({"color": "#ccc", "display": "block", "margin-bottom":"5px"});
    $("div.additionals p.subs").css({"float": "left", "clear": "both", "font-size":"0.9em"});
    $("div.additionals p.includes").css({"display": "inline", "clear": "both", "font-size":"0.9em"});
    $("div.additionals p.includes").hover(function(){
        $("div.additionals p.includes").css("cursor", "context-menu");
    });
    $("div.additionals p.price").css("float", "right");

    $("div.description").css({"clear": "both", "color":"#ccc", "line-height":".9em", "font-size":".9em"});

    $("div.course ul > li").css({"margin-bottom": "10px", "clear": "both"});
    $("div.course ul").find("ul >li").css({"margin-bottom": "0"});
    $("div.course ul").find("ul").css({"margin-bottom": "10px"});

    $("div.course ul > li.need_margin").css({"margin-left": "61px"});
    $("div.course ul li > p").css({"display": "block", "float": "left", "clear": "both", "color":"#ccc",
                                    "font-size":".8em", "font-style":"italic" });
    $("div.course ul li > ul").css({"display": "block", "float": "right", "width": "83%"});

    $("h3").css({"color": "#CF671F", "margin-bottom":"5px", "font-size":"1em"});

    //spacing for print out
    $("ul").css({"line-height": "1em"});
    $("div.lunch_menu > p").css({"line-height": "1em"});
    $("div.additionals").css({"margin-bottom": "10px", "line-height":".9em", "border": "1px solid #ccc", "padding": "10px 2px"});


    //styling datepicker
    $("#datepicker").css({"font-size": "1.0em", "font-family": "inherit",
    "color": "#CF671F", 
    "border": "none", 
    "width": "150px"});
    $("#datepicker").hover(function(){
        $("#datepicker").css({"cursor": "context-menu"});
    });
});

$( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "mm. dd. yy"
        //defaultDate: +1
    });

    // Getter
    var dateFormat = $( "#datepicker" ).datepicker( "option", "dateFormat" );
    //var defaultDate = $( "#datepicker" ).datepicker( "option", "defaultDate" );
    // Setter
    $( "#datepicker" ).datepicker( "option", "dateFormat", "mm. dd. yy" );
    //$( "#datepicker" ).datepicker( "option", "defaultDate", +1 );
  });


  /* credit to http://phppot.com/php/php-mysql-inline-editing-using-jquery-ajax/ */
  function saveToDatabase(editableObj,column,id) {
      
    $(editableObj).css("background","#FFF");
    var string = editableObj.innerHTML;
    if(string.includes("&nbsp;") == true){
        console.log("stripping the space");
        string = string.replace("&nbsp;", "").trim();
    }
    console.log(string);
	$.ajax({
		url: "../db/edit_lunch.php",
		type: "POST",
		data:'column='+column+'&editval='+string+'&id='+id,
		success: function(data){
            console.log(data);
			$(editableObj).css("background","#FDFDFD");
		}        
   });
}