<?php // index.php
include 'inc/db.php';
include 'inc/query.php';
include 'inc/headerFront.php';


$movies = randomMovies();

foreach ($movies as $movie) {
  echo '<div class="thumbnail"<img src="posters/'.$movie['id'].'.jpg" alt="#" /></div>';
}

?>


<button type="button" name="button">Voir plus de flims</button>

<?php
include 'inc/footerFront.php';
?>
