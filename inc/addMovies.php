<?php 
include 'fonctions.php';
include 'newMovie.php';
$opts = array (
	'http' => array(
		'method' => "GET"
		)
	);

$context = stream_context_create($opts);

if(!empty($_GET['addMovieId'])){

	$movieId = trim(strip_tags($_GET["addMovieId"]));

	if(strlen($movieId) > 6){
	
		$url = 'http://www.omdbapi.com/?i='.$movieId.'&r=json';

		$raw = file_get_contents($url, true, $context);

		$json = json_decode($raw, true);
	}


debug($json);

$addMovie = new addMovie($data = array(

	'slug' => '' ,
	'title' => $json['Title'] , 
	'year' => $json['Year'], 
	'genres' => $json['Genre'], 
	'plot' => $json['Plot'], 
	'directors' => $json['Director'], 
	'cast' => $json['Actors'] , 
	'writers' => $json['Writer'] , 
	'runtime' => $json['Runtime'] , 
	'mpaa' => $json['Rated'] , 
	'rating' => $json['Metascore'] , 
	'popularity' => $json['imdbRating'] , 
	'modified' => date('Y-m-d H:m:s'), 
	'created' => date('Y-m-d H:m:s'), 
	'poster_flag' => '0'  

	));

debug($addMovie);

	echo $addMovie -> input('slug', '');
	echo $addMovie -> input('title', $json['Title']);
	echo $addMovie -> input('year', $json['Year']);
	echo $addMovie -> input('genre', $json['Genre']);
	echo $addMovie -> input('plopt', $json['Plot']);
	echo $addMovie -> input('director', $json['Director']);
	echo $addMovie -> input('cast', $json['Actors']);
	echo $addMovie -> input('writers', $json['Writer']);
	echo $addMovie -> input('runtime', $json['Runtime']);
	echo $addMovie -> input('mpaa', $json['Rated']);
	echo $addMovie -> input('rating', $json['Metascore']);
	echo $addMovie -> input('popularity', $json['imdbRating']);
	echo $addMovie -> input('created', date('Y-m-d H:m:s'));
	echo $addMovie -> input('modified', date('Y-m-d H:m:s'));
	echo $addMovie -> input('flag','0');
	
	echo $addMovie -> submit();
}else{ ?>

<form action="#" method="GET">
		
	<input type="text" name="addMovieId" id="addMovieId">

</form>

<?php } ?>