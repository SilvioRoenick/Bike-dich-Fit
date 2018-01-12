<?php

if ($_POST['user_email'] != "" )
{
$new_name = $_POST['user_name'];
$new_vorname = $_POST['user_vorname'];
$new_email = $_POST['user_email'];
$new_passwort = $_POST['user_passwort'];
$sql = "INSERT INTO benutzer (Name,Vorname,email,Passwort) VALUES ('$new_name','$new_vorname','$new_email','$new_passwort')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
echo '<br><br><br><p> Benutzer wurde Angelegt.</p>';
}
else
{
echo '<form action="?reqs=registrieren" method="POST">';
echo 'email:';
echo '<br>';
echo '<input type="text" name="user_email" value="">';
echo '<br>';
echo 'Name:';
echo '<br>';
echo '<input type="text" name="user_name" value="">';
echo '<br>';
echo 'Vorname:';
echo '<br>';
echo '<input type="text" name="user_vorname" value="">';
echo '<br>';
echo 'Passwort:';
echo '<br>';
echo '<input type="password" name="user_passwort" value="">';
echo '<br>';
echo '<br>';
echo '<input type="Submit" value="Anmelden">';
echo '<br>';
echo '</form>';
}

?>