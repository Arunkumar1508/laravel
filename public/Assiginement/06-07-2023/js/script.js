
$("ul").on("click", "li",function () {
    $(this).toggleClass("completed");
});
$("ul").on("click", "span",function (event) {
$(this).parent().fadeOut(500,function(){
    $(this).remove();
});
event.stopPropagation();
});
$("input[type='text'").keypress(function(event){
if(event.which === 13){
    var todoText =$(this).val();
    $(this).val("");
    $("ul").append ("<li><span>🗑</span>" + todoText + "</li>")
}
}); 
$(".plus").click(function(){
    $("input[type='text'").fadeToggle();
});































    // if ($(this).css("color") === "rgb(128, 128, 128)") {
    //     $(this).css({
    //         "color":"black",
    //     textDecoration: "none"
    //     });
    // }
    // else {
    //         $(this).css({
    //             "color": "gray",
    //             "textDecoration": "line-through"
    //         });
    //      }

   