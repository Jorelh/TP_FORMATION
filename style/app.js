// Recherche dropdown

$('.dropdown').click(function(){
  if( $(this).hasClass(open) ) {
    $('form#check').fadeOut(300);
    $(this).removeClass('open');

  } else{
    $('form#check').slideDown(300);
    $(this).addClass('open');
  }
});
