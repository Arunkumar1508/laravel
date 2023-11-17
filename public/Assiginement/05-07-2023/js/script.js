$("h1").click(function(){
$(this).css("color","red");
$(this).css("font-size","150px");
// alert("hii")
});

$("li").on("mouseenter",function(){
    $(this).css("font-weight","bold");
    });
    

$("li").on("mouseleave",function(){
$(this).css("color","blue");
});


$("button").on("click",function(){
    $('div').fadeToggle(1000);
 
});

$("button").on("click",function(){
    $('div').slideToggle(1000,function(){
        $(this).slideToggle();
    });
});