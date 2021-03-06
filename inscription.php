<?php
include('inc/fonctions.php');
$errors = array();
$success = false;
$title = 'Inscription';

if(!empty($_POST['submitinscription'])) {

	// protection XSS
	$pseudo = trim(strip_tags($_POST['pseudo']));
	$email  = trim(strip_tags($_POST['email']));
	$password1  = trim(strip_tags($_POST['password1']));
	$password2  = trim(strip_tags($_POST['password2']));

	// GESTION DES ERROR
	// Error Pseudo
	    if(empty($pseudo)) {
	      $errors['pseudo'] = 'Veuillez indiquer un pseudo.';
	    }
      elseif(strlen($pseudo) > 100) {
        $errors['pseudo'] = 'Votre pseudo est trop long.';
      }
      elseif(strlen($pseudo) < 2) {
        $errors['pseudo'] = 'Votre pseudo est trop court.';
      }
	    elseif(preg_match('/\d/', $pseudo)) {
	      $errors['pseudo'] = 'Votre nom ne doit pas contenir de chiffre.';
	    }
	    // verifier que pseudo est unique
         else {
        	$sqlpseudo = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
                $smtp = $dbh->prepare($sqlpseudo);
                $smtp->bindValue(':pseudo',$pseudo);
                $smtp->execute();
                $pseudoexist = $smtp->fetch();
            if($pseudoexist) {
             	$errors['pseudo'] = 'Ce pseudo existe déjà.';
            }

	    }
	// Error => email
	    if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
	      $errors['email'] = 'Adresse email invalide.';
	    }
	    elseif(strlen($email) > 50) {
	      $errors['email'] = 'Votre adresse e-mail est trop longue.';
	    }
	    // verifier que email est unique dans la table user
	    else{
	    	$sqlmail = "SELECT email FROM users WHERE email = :email";
                $smtp = $dbh->prepare($sqlmail);
                $smtp->bindValue(':email',$email);
                $smtp->execute();
                $resultmail = $smtp->fetch();

                if($resultmail) {
                   $errors['email'] = 'Cette adresse e-mail existe déjà.';
                }
	    }
	// Error  password
	     if($password1 != $password2) {
	      $errors['password'] = 'Les mots de passes ne sont pas identiques.';
	    }
	    elseif(strlen($password1) <= 5) {
	      $errors['password'] = 'Votre mot de passe doit faire plus de 5 caractères.';
	    }

	    // Si pas d'erreur => creation du compte
	    if(count($errors) == 0) {
	    	// hash password
	    	$hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

	    	// autre method sha

	    		// $salt = '1959aa30dfsbaboudjiohgaFGDfE$michel?RgviWEFW@#$milo@?@dajwewrIGO@#r2r';

    			// $passwordhashed = hash("sha256", $password1.$salt);
        // $passmd5 = md5($salt . $password);
	    	// creation du token
	    	$token = generateRandomString(50);
	    		// autre method creation token

	    			// $pepper = '1978milo2010babou1980michel??#@$$$76463$$$!!!876??!!!#ghgjjgeygjhgj';
    				// $peps = time();
    				// $token = hash("sha256", $peps.$pepper);

	    	// creation compte => insert dans BDD
	    	$inscription = "INSERT INTO users VALUES('',:pseudo,:email,:password,:token,NOW(),'user')";
	    	$smtp = $dbh->prepare($inscription);
	    		$smtp->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
	    		$smtp->bindValue(':email',$email, PDO::PARAM_STR);
	    		$smtp->bindValue(':password',$hashedPassword, PDO::PARAM_STR);
	    		$smtp->bindValue(':token',$token, PDO::PARAM_STR);
	    	$smtp->execute();

	    	$success = true;

	    	// faire une connection +++
	    }



}



?>


<?php include('inc/headerFront.php'); ?>



	<?php if($success) {
		echo 'Bravo, vous êtes inscrit!';
	} else { ?>

		<section class="wrapper">

			<form method="POST" action="inscription.php" id="forminscription">

				<h1>Inscription</h1>

				<div class="form-group">
					<label for="pseudo">Pseudo *</label><br>
					<span class="error"><?php if(!empty($errors['pseudo'])) { echo $errors['pseudo']; } ?></span>
					<input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php if(!empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>" />
				</div>

				<div class="form-group">
					<label for="email">Email *</label><br>
					<span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
					<input type="email" name="email" id="email" class="form-control" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>" />
				</div>

				<div class="form-group">
					<label for="password1">Mot de passe *</label><br>
					<span class="error"><?php if(!empty($errors['password'])) { echo $errors['password']; } ?></span>
					<input type="text" name="password1" id="password1" class="form-control" value="<?php if(!empty($_POST['password1'])) { echo $_POST['password1']; } ?>" />
				</div>

				<div class="form-group">
					<label for="password2">Repeter le mot de passe *</label><br>
					<input type="text" name="password2" id="password2" class="form-control" value="<?php if(!empty($_POST['password2'])) { echo $_POST['password2']; } ?>" />
				</div>

				<input type="submit" name="submitinscription" value="Je m'inscris" class="buttonsearch" />
			</form>

		</section>
	<?php } ?>

<?php include('inc/footerFront.php'); ?>
