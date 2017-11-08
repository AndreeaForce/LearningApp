//settings tab

//Account click event
$("#account-arrow--up").click(function(){
    $(".account--content").slideUp("slow");
    $("#account-arrow--up").hide("slow");
    $("#account-arrow--down").show("slow");
});
$("#account-arrow--down").click(function(){
    $(".account--content").slideDown("slow");
    $("#account-arrow--up").show("slow");
    $("#account-arrow--down").hide("slow");
});

//Kids click event
$("#kids-arrow--up").click(function(){
    $(".profiles--content").slideUp("slow");
    $("#kids-arrow--up").hide("slow");
    $("#kids-arrow--down").show("slow");
});
$("#kids-arrow--down").click(function(){
    $(".profiles--content").slideDown("slow");
    $("#kids-arrow--up").show("slow");
    $("#kids-arrow--down").hide("slow");
});


//About click event
$("#about-arrow--up").click(function(){
    $(".about--content").slideUp("slow");
    $("#about-arrow--up").hide("slow");
    $("#about-arrow--down").show("slow");
});
$("#about-arrow--down").click(function(){
    $(".about--content").slideDown("slow");
    $("#about-arrow--up").show("slow");
    $("#about-arrow--down").hide("slow");
});

