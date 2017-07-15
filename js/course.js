$(document).ready(function(){
    $("div#menu ul").css("list-style", "none");
    $("div#menu").css("padding-left", "0");
    $("div#menu h2").css({"padding": "0", "float": "left", "margin": "0"});
    $("div#menu h1").css({"padding-left": "0", "float": "none", "margin-left": "0"});

    $("h2 + p.price").css({"float": "right", "color":"#CF671F"});
    $("div.courses").css({"clear": "both"});
    $("div.additionals p").css({"color": "#ccc", "display": "block"});
    $("div.additionals p.name").css({"float": "left", "clear": "both"});
    $("div.additionals p.price").css("float", "right");


    $("div#two ul").css({"clear": "both"});
    $("div#two ul p").css({"display": "block"});
    $("div#two ul p.name").css({"float": "left"});
    $("div#two ul p.price").css({"float": "right"});
    $("div#two ul div.description").css({"clear": "both", "color":"#ccc", "line-height":".9em"});
    $("div#two li").css({"margin-left": "55px"});
    $("div#two ul li").css({"margin-bottom": "4px"});


    $("div.course ul > li").css({"margin-bottom": "10px", "clear": "both"});
    $("div.course ul").find("ul >li").css({"margin-bottom": "0"});
    $("div.course ul").find("ul").css({"margin-bottom": "10px"});

    $("div.course ul > li.need_margin").css({"margin-left": "61px"});
    $("div.course ul li > p").css({"display": "block", "float": "left", "clear": "both", "color":"#ccc",
                                    "font-size":".8em", "font-style":"italic" });
    $("div.course ul li > ul").css({"display": "block", "float": "right", "width": "83%"});

    $("div#omakase h3").css({"display": "block", "color": "#CF671F"});
    $("div#omakase h3.name").css({"float": "left", "clear": "both", "margin-left": "61px"});
    $("div#omakase h3.price").css({"float": "right"});
    $("div#omakase p.name").css({"margin-left": "61px"});
    $("div#omakase h3:nth-child(6)").css({"margin-top": "10px"});
    $("div#omakase h3:nth-child(7)").css({"margin-top": "10px"});

    //spacing for print out
    $("ul").css({"line-height": "1em"});
    $("div.courses > p").css({"line-height": "1em"});
    $("div.additionals").css({"margin-bottom": "10px", "line-height":".9em"});
    


});