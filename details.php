<?php // index.php

include 'inc/db.php';
include 'inc/query.php';
include 'inc/fonctions.php';
include 'inc/headerFront.php';
// posters path
$filename = 'posters/' . $_GET['id']. '.jpg';

//movie details table
if(!empty($_GET["id"])){
	$movieId = trim(strip_tags($_GET["id"]));
	$movieDetails = getMovie($movieId);
}else{

	echo '<h1><a href="index.php">Retour à l\'index, aucun film choisi</a></h1>';
	die();
}
?>

<section class="wrapper">



	<div class="title">

		<?php
		//movie title
		$divTitle = getTitle($movieDetails, $movieId);
			echo $divTitle;

		//movie directors
		$divDirectors = getDirectors($movieDetails, $movieId);
			echo $divDirectors;

		?>
	</div>

	<div class="mainContainerDetails">
 <?php
		//movie poster
		$divThumb = getImage($movieDetails, $movieId, $filename);
			echo $divThumb;

		//movie pitch
		$divPlot = getPlot($movieDetails, $movieId);
			echo $divPlot;

		//movie release
		$divYear = getYear($movieDetails, $movieId);
			echo $divYear;

		//movie genre
		$divGenres = getGenres($movieDetails, $movieId);
			echo $divGenres;

		//movie cast
		$divCast = getCast($movieDetails, $movieId);
			echo $divCast;

		//movie writers
		$divWriters = getWriters($movieDetails, $movieId);
			echo $divWriters;

		//movie rating
		$divRating = getRating($movieDetails, $movieId);
			echo $divRating;

		//movie popularity
		$divPopularity = getPopularity($movieDetails, $movieId);
			echo $divPopularity;

		?>

	</div>

</section>


<?php
include 'inc/footerFront.php';
?>










?>
