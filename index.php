<?php
error_reporting(E_ALL ^ E_NOTICE); 
session_start(); 

include ("config.php");

// Datenbankverbindung herstellen
try { 
	$pdo = new PDO("mysql:host=$db_hostname;dbname=$db_dbname", "$db_username", "$db_password");
	}
catch(PDOException $e)
	{
	echo $e->getMessage();
	}

if (isset($_GET['reqs'])) {$reqSite = $_GET['reqs'];}
if (isset($_GET['reqa'])) {$reqAction = $_GET['reqa'];}

if ( $_SESSION['login'] != true AND $_POST['login_email'] != "" AND $_POST['login_passwort'] != ""  )
{
	$sql = "SELECT * FROM benutzer";
	foreach ($pdo->query($sql) as $row) {
		if (($row['email'])==($_POST['login_email']) AND ($row['Passwort'])==($_POST['login_passwort']))
		{
			$_SESSION['email'] = $_POST['login_email'];
			$_SESSION['login'] = true;
		}
		else{ echo 'Login Fehler';}		
	}	
}

	
echo '<!DOCTYPE html>';
echo '<html>';

include ("include/html-header.php");

echo '<body>';

echo '<div class="site-wrapper">';

include ("include/header.php");

echo '<div class="site-content">';

//echo 'Hallo Welt!';

//echo $_POST['login_benutzer'];
//echo $_POST['login_passwort'];
//echo $login_benutzer;
//echo $login_passwort;
//echo $_SESSION['login'];
///echo $_SESSION['benutzer'];

if ( $_SESSION['login'] == true )
	{
		if ($reqSite == "logout")
		{
			session_destroy();
			session_start();
			include ("include/login.php"); 
		}
		else
		{
			include ("include/content.php"); 
		}
	}
	else
	{
		include ("include/login.php"); 
	}
	
echo '</div>'; // site-content
include ("include/footer.php");

echo '</div>'; // site-container
echo '</body>';
echo '</html> ';

?>
