// Recherche dropdown



$(document).ready(function(){

$(".buttonsearch").click(function() {

  if ($(".dropdown").hasClass("hide")){

  $(".dropdown").removeClass("hide");

  } else {
    $(".dropdown").addClass("hide");
  }
});

});
