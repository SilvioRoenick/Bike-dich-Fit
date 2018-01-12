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
	$sql = "SELECT * FROM benutzer WHERE email='$_POST[login_email]'";
	$result = $pdo->query($sql)->fetchAll();
	if(count($result) >= 1 )
	{
	foreach ($pdo->query($sql) as $row) {
		//$anzahl = count($row);
		//echo 'ff';
		if (($row['email'])==($_POST['login_email']) AND ($row['Passwort'])==($_POST['login_passwort']))
		{
			//$_SESSION['email'] = $_POST['login_email'];
			$_SESSION['benutzerID'] = $row['Benutzer_ID'];
			$_SESSION['login'] = true;
		}
		else{ 
		//echo 'login error 1';
		$loginError = true;
		}		
	}
	}
	else{
		//echo 'login error 2';
		$loginError = true;
	}
		
}

//if ($_SESSION['language'] == "")
//{
$_SESSION['language'] = "deu";
//$_SESSION['language'] = "eng";
//}
include ("include/languages/$_SESSION[language].php");

if ($reqAction == "logout")
{
	session_destroy();
	session_start();
}
	
echo '<!DOCTYPE html>';
echo '<html lang="'.$lang['iana'].'">';

include ("include/html-header.php");

echo '<body>';

echo '<div class="site-wrapper">';

include ("include/header.php");

include ("include/menue.php");

echo '<div class="site-content">';

if ($reqSite == "home"){include ("include/frontpage.php");}
elseif ($reqSite == "login"){include ("include/login.php");}
elseif ($reqSite == "registrieren"){include ("include/registrieren.php");}
elseif ($reqSite == "eventview"){include ("include/eventview.php");}
elseif ($reqSite == "eventedit" AND $_SESSION['login'] == true){include ("include/eventedit.php");}
elseif ($reqSite == "userprofil" AND $_SESSION['login'] == true){include ("include/userprofil.php");}
elseif ($reqSite == "content" AND $loginError == true){include ("include/login.php");}
elseif ($reqSite == "content" AND $_SESSION['login'] == true){include ("include/content.php");}
else {include ("include/frontpage.php");}
	
echo '</div>'; // site-content
include ("include/footer.php");

echo '</div>'; // site-container
echo '</body>';
echo '</html> ';

$pdo = null;

?>
