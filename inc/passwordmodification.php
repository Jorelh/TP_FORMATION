<?php //passwordmodification.php
  

include('helper/db.php');
include('helper/fonctions.php');
$errors = array();
$success = false;
$title = 'Modification mot de passe';

if(!empty($_POST['submitnewpassword'])) {

	$password1  = trim(strip_tags($_POST['newpassword']));
	$password2  = trim(strip_tags($_POST['newpassword2']));

	if($password1 != $password2) {
       $errors['password'] = 'Les mots de passes ne sont pas identiques.';
	}
	elseif(strlen($password1) <= 5) {
	    $errors['password'] = 'Votre mot de passe doit faire plus de 5 caractères.';
	}

	if(count($errors) == 0) {
    	// hash password
    	$hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
    	// creation nouveau token
    	$newtoken = generateRandomString(50);
	    	if(!empty($_GET['email']) && !empty($_GET['token'])) {
	    		$getmail = urldecode($_GET['email']);
				$gettoken = urldecode($_GET['token']);
			
				// verification user existe bien
				$sqlverif = "SELECT id FROM users WHERE email = :email AND token = :token";   
                $stmt = $dbh->prepare($sqlverif);
                $stmt->bindValue(':email',$getmail);
                $stmt->bindValue(':token',$gettoken);
                $stmt->execute();
                $verifIdExist = $stmt->fetch();

                // if user exist bien dans la table
                // modification de son password et du token
                if (!empty($verifIdExist)) {
		            $id_user = $verifIdExist['id'];
		            $update = "UPDATE users SET password = :newpassword, token = :newtoken WHERE id = $id_user";
		            $stmt = $dbh->prepare($update);
		            $stmt->bindValue(':newpassword',$hashedPassword);
                	$stmt->bindValue(':newtoken',$newtoken);
		            $stmt->execute();
		    
		         	$success = TRUE;
		         	// redirection
		         	header('location: connexion.php');

		        }
		        else {
		            $errors['password'] = 'erreur';
		        }




	    	}
	}
}

?>
<?php include('inc/header.php'); ?>
	
	<h1>Modifier votre mot de passe</h1>

	<form method="post">
        <label for="newpassword">votre nouveau mot de passe</label>
        <input type="password" name="newpassword" id="newpassword"/>

        <label for="newpassword2">repeat</label>
        <input type="password" name="newpassword2" id="newpassword2"/>
       
        <input type="submit" name="submitnewpassword" value="modifier"/>
        
    </form>

	

<?php include('inc/footer.php'); ?>