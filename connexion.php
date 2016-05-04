<?php // connexion.php
session_start();
include('inc/fonctions.php');
$errors = array();
$title = 'Connexion';
if(!empty($_POST['submitconnexion'])) {

	//print_r($_COOKIE['usercook']);

	// protection XSS
	$pseudo    = trim(strip_tags($_POST['pseudo']));
	$password  = trim(strip_tags($_POST['password']));


	if(empty($pseudo)) {
	    $errors['pseudo'] = 'Veuillez indiquer un pseudo.';
	}
	if(empty($password)) {
	    $errors['password'] = 'Veuillez indiquer un password.';
	}
	// Si pas d'erreur => verification que compte existe
	if(count($errors) == 0) {

		// verifier si utilisateur existe et si mot de passe correspond.
		$sqluser = "SELECT * FROM users WHERE pseudo = :pseudo OR email = :pseudo";
	        $smtp = $dbh->prepare($sqluser);
	        $smtp->bindValue(':pseudo',$pseudo);
	        $smtp->execute();
	        $user = $smtp->fetch();

	        if(!$user) {
	           $errors['pseudo'] = 'pseudo invalide.';
	        } else {
	        	if(password_verify($password,$user['password'])) {
	        		// if rember est coché
	        		if(!empty($_POST['remember'])) {
	        			// création d'un cookies qui dure 5 jour
	setcookie('usercook', $user['id']. '---' . sha1($user['pseudo'].$user['password'].$_SERVER['REMOTE_ADDR']) , time() + 3600 * 24 * 5,'/');

	        		}

	        		$_SESSION['user'] = array(
	        			'id'     => $user['id'],
	        			'pseudo' => $user['pseudo'],
	        			'role'   => $user['role'],
	        			'ip'     => $_SERVER['REMOTE_ADDR'],
	        				// HTTP_USER_AGENT => signature du navigateur
	        				// et verifier que ok dans fonction islogged
	        		);

	        		header('Location: index.php');

	        	} else {
	        		$errors['password'] = 'password invalide.';
	        	}
	        }
	}

}

?>



<?php include('inc/headerFront.php'); ?>

	<h1>Connexion</h1>


		<form method="POST" action="connexion.php" id="formconnexion">
			<div class="form-group">
				<label for="pseudo">Pseudo ou email *</label>
				<span class="error"><?php if(!empty($errors['pseudo'])) { echo $errors['pseudo']; } ?></span>
				<input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php if(!empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>" />
			</div>

			<div class="form-group">
				<label for="password">Mot de passe *</label>
				<span class="error"><?php if(!empty($errors['password'])) { echo $errors['password']; } ?></span>
				<input type="text" name="password" id="password" class="form-control" value="<?php if(!empty($_POST['password'])) { echo $_POST['password']; } ?>" />
			</div>

			<label>
				<input type="checkbox" name="remember" /> Se souvenir de moi

			</label>
			<br>
			<input type="submit" name="submitconnexion" value="Connexion" class="btn btn-default" />
		</form>
		<a href="passwordforget.php">Mot de passe perdu</a>


<?php include('inc/footerFront.php'); ?>
