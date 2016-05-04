<?php

//Fonction de mise en forme des tableaux
function debug($tab){
  echo '<pre>';
  print_r($tab);
  echo '</pre>';
}

//slug
function slugify($text){

  // remplace les caractères non alphanumérique par _
  $text = preg_replace('~[^\pL\d]+~u', '_', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // supprime les caractères indésirables 
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)){

    return 'n-a';

  }else{

  return $text;
  }
}

