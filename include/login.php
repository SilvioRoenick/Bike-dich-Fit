<?php

if($loginError == true)
{
	echo '<h1>'.$lang['loginError'].'</h1>';
}

echo '<form action="?reqs=content" method="POST">';
echo 'email:';
echo '<br>';
echo '<input type="text" name="login_email" value="">';
echo '<br>';
echo 'Kennwort:';
echo '<br>';
echo '<input type="password" name="login_passwort" value="">';
echo '<br>';
echo '<br>';
echo '<input type="Submit" value="Login">';
echo '<br>';
echo '</form>';

?>