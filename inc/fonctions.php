<?php

//Fonction de mise en forme des tableaux
function debug($tab){
  echo '<pre>';
  print_r($tab);
  echo '</pre>';
}


//img path for selected movie
function getImage($table, $id, $file){
	if(!empty($table)){
		if($table['id'] == $id){

			$img = '<div class="imgDetail"><img src="'.$file.'"></div>';
			return  $img;
		}
	}
}


//get title for selected movie from index.php
function getTitle($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$title = '<div><h2>'.$table['title'].'</h2></div>';
			return $title;
		}
	}
}

function getPlot($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$plot = '<div><h3>Scenario: </h3><p>'.$table['plot'].'</p></div>';
			return $plot;
		}
	}
}

function getYear($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$year = '<div><h3>Année: </h3><p>'.$table['year'].'</p></div>';
			return $year;
		}
	}
}

function getGenres($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$genres = '<div><h3>Genre: </h3><p>'.$table['genres'].'</p></div>';
			return $genres;
		}
	}
}

function getDirectors($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$directors = '<div><p>'.$table['directors'].'</p></div>';
			return $directors;
		}
	}
}

function getCast($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$cast = '<div><h3>Casting: </h3><p>'.$table['cast'].'</p></div>';
			return $cast;
		}
	}
}

function getWriters($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$writers = '<div><h3>Directeur: </h3><p>'.$table['writers'].'</p></div>';
			return $writers;
		}
	}
}

function getRating($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$rating = '<div><h3>Note: </h3><p>'.$table['rating'].'</p></div>';
			return $rating;
		}
	}
}

function getPopularity($table, $id){
	if(!empty($table)){
		if(!empty($table['id'] == $id)){
			$popularity = '<div><h3>Popularité: </h3><p>'.$table['popularity'].'</p></div>';
			return $popularity;
		}
	}
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
