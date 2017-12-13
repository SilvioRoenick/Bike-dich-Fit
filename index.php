<?php

error_reporting(E_ALL ^ E_NOTICE); 

session_start(); 

include ("config.php");

if ( $_POST['user'] != "" AND $_POST['password'] != ""  )
{
	if (($user_name)==($_POST['user']) AND ($user_clear_password)==($_POST['password']))
	{
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['login'] = true;
	}
}

echo '<!DOCTYPE html>';
echo '<html>';

include ("include/html-header.php");

echo '<body>';

echo 'Hallo Welt!';

//echo $_POST;
//echo $user_name;
//echo $user_clear_password;
//echo $_SESSION['login'];
//echo $_SESSION['user'];

if ( $_SESSION['login'] == true )
	{
		if ($reqSite == "---")
		{
			include ("---"); 
		}
		else
		{
			include ("include/user-site.php"); 
		}
	}
	else
	{
		include ("include/login.php"); 
	}
	
echo '</body>';
echo '</html> ';

?>
