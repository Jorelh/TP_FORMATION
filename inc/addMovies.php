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

$addMovie = new addMovie(array(

	'slug' => '' ,
	'title' => '' , 
	'year' => '' , 
	'genres' => '' , 
	'plot' => '' , 
	'directors' => '' , 
	'cast' => '' , 
	'writers' => '' , 
	'runtime' => '' , 
	'mpaa' => '' , 
	'rating' => '' , 
	'popularity' => '' , 
	'modified' => '' , 
	'created' => '' , 
	'poster_flag' => ''  

	));

debug($addMovie);

	echo $addMovie -> input('slug');
	echo $addMovie -> input('title');
	echo $addMovie -> input('year');
	echo $addMovie -> input('genres');
	echo $addMovie -> input('plot');
	echo $addMovie -> input('directors');
	echo $addMovie -> input('cast');
	echo $addMovie -> input('writers');
	echo $addMovie -> input('runtime');
	echo $addMovie -> input('mpaa');
	echo $addMovie -> input('rating');
	echo $addMovie -> input('popularity');
	echo $addMovie -> input('modified');
	echo $addMovie -> input('created');
	echo $addMovie -> input('poster_flag');
	echo $addMovie -> submit();
}else{ ?>

<form action="#" method="GET">
		
	<input type="text" name="addMovieId" id="addMovieId">

</form>

<?php } ?>