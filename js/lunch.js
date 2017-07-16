$(document).ready(function(){
    $("div#menu ul").css("list-style", "none");
    $("div#menu").css("padding-left", "0");
    $("div#menu h2").css({"padding": "0", "float": "left", "margin": "0"});
    $("div#menu h1").css({"padding-left": "0", "float": "none", "margin-left": "0"});
    $("div#tonkatsu h1").css("margin-bottom", "0");
   
    $("div.lunch_menu").css({"clear": "both"});
    $("div.additionals p.name").css({"color": "#ccc", "display": "block", "margin-bottom":"5px"});
    $("div.additionals p").css({"float": "left", "clear": "both"});
    $("div.additionals p.price").css("float", "right");

    $("div.description").css({"clear": "both", "color":"#ccc", "line-height":".9em"});

    $("div.course ul > li").css({"margin-bottom": "10px", "clear": "both"});
    $("div.course ul").find("ul >li").css({"margin-bottom": "0"});
    $("div.course ul").find("ul").css({"margin-bottom": "10px"});

    $("div.course ul > li.need_margin").css({"margin-left": "61px"});
    $("div.course ul li > p").css({"display": "block", "float": "left", "clear": "both", "color":"#ccc",
                                    "font-size":".8em", "font-style":"italic" });
    $("div.course ul li > ul").css({"display": "block", "float": "right", "width": "83%"});

    $("h3").css({"color": "#CF671F", "margin-bottom":"5px"});

    //spacing for print out
    $("ul").css({"line-height": "1em"});
    $("div.lunch_menu > p").css({"line-height": "1em"});
    $("div.additionals").css({"margin-bottom": "10px", "line-height":".9em", "border": "1px solid #ccc", "padding": "10px 2px"});

});