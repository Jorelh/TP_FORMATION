<?php //passwordforget.php

include('helper/db.php');
include('helper/fonctions.php');
$errors = array();
$success = false;
$title = 'Inscription';
 
if(!empty($_POST['submitforgetpassword'])){
	// protection XSS
	$email = trim(strip_tags($_POST['email']));

		if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
	      $errors['email'] = 'Adresse email invalide.';
	    }
	    elseif(strlen($email) > 50) {
	      $errors['email'] = 'Votre adresse e-mail est trop longue.';
	    }
	    // verifier que email exist dans la BDD
	    else{
	    	$sqlmail = "SELECT pseudo,email,token FROM users WHERE email = :email";
                $smtp = $dbh->prepare($sqlmail);
                $smtp->bindValue(':email',$email);
                $smtp->execute();
                $user = $smtp->fetch();
                
                if(!$user) {
                   $errors['email'] = 'Cette adresse e-mail n\'existe pas.';
                } else {
                	// envoi email avec lien contenant le token
                	$tokenprepare = urlencode($user['token']);

                	// mettre une date d'expiration de validation du token ++ securite ++
                	$emailprepare = urlencode($user['email']);
                	// envoie de mail par 
                	$body = '<p>Veuillez cliquer sur le lien ci-dessous</p>';
                	$body .= '<p><a href="http://localhost/antoine/jour9/13-2j-Authentification%20et%20autorisation/inscription//passwordmodification.php?email='.$emailprepare.'&token='.$tokenprepare.'">ICI</a></p>';
                	$body .= '<p>Rappel : Votre pseudo => '. $user['pseudo'] .'</p>';
                	echo $body;
                }
	    }
}


?>

<?php include('inc/header.php'); ?>
	
	<h1>Mot de passe perdu!</h1>


		<form method="POST" action="passwordforget.php" id="formforgetpassword">
			<div class="form-group">
				<label for="email">Email*</label>
				<span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
				<input type="text" name="email" id="email" class="form-control" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>" />
			</div>
			
			<input type="submit" name="submitforgetpassword" value="Envoyer" class="btn btn-default" />
		</form>
		
<?php include('inc/footer.php'); ?>




