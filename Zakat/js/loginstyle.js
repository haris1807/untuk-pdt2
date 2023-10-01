$(document).ready(function(){
  
  $(".form_before_launch").click(function(){
    $(this).animate({height:"250px",width:"400px"});
    $(this).children("p").animate({fontsize:"25px"});
   $(".form").delay(500).fadeIn();
  });
  $("#submit").click(function(){
   var u_name = $("#username").val();
    var pass = $("#password").val();
    if(u_name!="" && pass!=""){
      $(".form_before_launch").fadeOut();
      $("h1").fadeIn();
      $("h1").html("WELCOME  "+ u_name);
      $("h1").animate({marginTop:"200px"});
    };
  });
  
  
  
});


