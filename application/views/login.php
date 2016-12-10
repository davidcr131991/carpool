

<?php
/*
 * 
 *
	require_once('functions.php');
	if(loggedin())
		header("Location: index.php");
	else if(isset($_POST['action'])) {
		$email = mysql_real_escape_string($_POST['email']);
		if($_POST['action']=='login') {
			if(trim($_POST['email']) == "" or trim($_POST['password']) == "")
				header("Location: login.php?nerror=1"); // 
			else {
				// codigo para registrar al usuario e iniciar sesion
				connectdb();
				$query = "SELECT random,hash FROM users WHERE email='".$email."'";
				$result = mysql_query($query);
				$fields = mysql_fetch_array($result);
				$currhash = crypt($_POST['password'], $fields['random']);
				if($currhash == $fields['hash']) {
					$_SESSION['username'] = $email;
					header("Location: index.php");

				} else
					header("Location: login.php?error=1");
					
			}
		} else if($_POST['action']=='ldaplogin'){
			$ldap_uid = strip_tags($_POST['username']);
			$ldap_pass = strip_tags($_POST['password']);
			$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
			if($ldap_uid!='administrator')
			{
			$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_uid)");
			$info = ldap_get_entries($ds, $sr);
			$ldap_uid = $info[0]['dn'];
			$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass);
			if($do_bind){
				header("Location: register.php");
			}
			else{
				header("Location: login.php?ldaperr=1");			}
			}
		}

	}
?>
 */
//<?php
include("header.php");
//?>

 <div class="container">
<?php
        if(isset($_GET['logout']))
          echo("<div class=\"alert alert-info\">\nYou have logged out successfully!\n</div>");
        else if(isset($_GET['error']))
          echo("<div class=\"alert alert-error\">\nIncorrecto usuario o contraseña!\n</div>");
      else if(isset($_GET['ldaperr']))
          echo("<div class=\"alert alert-error\">\nIncorrect LDAP username or LDAP password!\n</div>");
        else if(isset($_GET['registered']))
          echo("<div class=\"alert alert-success\">\nRegistro exitoso! Inicie sesion para continuar.\n</div>");
        else if(isset($_GET['exists']))
          echo("<div class=\"alert alert-error\">\nUsuario ya existe! Por favor intente con usuario diferente.\n</div>");
        else if(isset($_GET['nerror']))
          echo("<div class=\"alert alert-error\">\nPor favor rellene los campos si quiere continuar!\n</div>");
      ?>
      <h1><small>inicio de sesion</small></h1>
      <p>inicie sesion para continuar.</p><br/>
      <form method="post" action="login.php">
        <input type="hidden" name="action" value="login"/>
        Correo: <input type="text" name="email"/><br/>
        Contraseña: <input type="password" name="password"/><br/><br/>
        <input class="btn" type="submit" name="submit" value="Login"/>
      </form>
      <hr/>
      <form>
        <input type="hidden" name="action" value="ldaplogin"/>
        <h1><small>Nuevo Usuario? Registrese ahora mismo</small></h1>
        <a href="register.php" class="btn btn-info" role="button"> Registro </a>
    </form>
    </div> <!-- /container -->

<?php
	include('footer.php');
?>
