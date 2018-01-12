<?php

if ($_POST['user_email'] != "" )
{
//echo 'postrein';
$new_name = $_POST['user_name'];
$new_vorname = $_POST['user_vorname'];
$new_email = $_POST['user_email'];
$sql = "UPDATE benutzer SET Name='$new_name', Vorname='$new_vorname', email='$new_email' WHERE Benutzer_ID='$_SESSION[benutzerID]'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
}

$sql = "SELECT * FROM benutzer WHERE Benutzer_ID='$_SESSION[benutzerID]'";
$datensatz = $pdo->query($sql)->fetch();
//$benutzerId = $datensatz['Benutzer_ID'];
$email = $datensatz['email'];
$name = $datensatz['Name'];
$vorname = $datensatz['Vorname'];

echo '<form action="?reqs=userprofil" method="POST">';
echo 'email:';
echo '<br>';
echo '<input type="text" name="user_email" id="upUserEmail" value="'.$email.'">';
echo '<br>';
echo '<p id="upUserEmailMsg"></p>';
echo '<br>';
echo 'Name:';
echo '<br>';
echo '<input type="text" name="user_name" id="upUserName" value="'.$name.'">';
echo '<br>';
echo '<p id="upUserNameMsg"></p>';
echo '<br>';
echo 'Vorname:';
echo '<br>';
echo '<input type="text" name="user_vorname" id="upUserVorname" value="'.$vorname.'">';
echo '<br>';
echo '<p id="upUserVornameMsg"></p>';
echo '<br>';
echo '<br>';
echo '<input type="Submit" id="upAktualisieren" value="Aktualisieren">';
echo '<br>';
echo '</form>';

?>