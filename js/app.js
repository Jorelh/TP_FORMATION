// Recherche dropdown



$(document).ready(function){
  console.log ("bouton ta mère");
   //alert('bouton ta mère');
$(".buttonsearch").click(function() {

  if ($(".dropdown").hasClass(".hide")){

  $(".dropdown").removeClass(".hide");

  } else {
    $(".dropdown").addClass(".hide");
  }
});

}
