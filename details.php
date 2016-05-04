<?php // index.php

include 'inc/db.php';
include 'inc/query.php';
include 'inc/fonctions.php';
include 'inc/headerFront.php';


if(!empty($_GET["id"])){
	$movieId = $_GET["id"];
	$movieDetails = getMovie($movieId);
}else{

	echo '<h1><a href="index.php">Retour à l\'index, aucun film choisi</a></h1>';
	die();
}
debug($movieId);
debug($movieDetails);


?>

<section class="wrapper">


<?php

$divThumb = getImage($movieDetails, $movieId, $filename); 
	echo $divThumb;


?>



</section>


<?php
include 'inc/footerFront.php';
?>










?>



