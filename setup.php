<?php

error_reporting(E_ALL ^ E_NOTICE); 

include ("config.php");

// Datenbankverbindung herstellen
try { 
	$pdo = new PDO("mysql:host=$db_hostname;dbname=$db_dbname", "$db_username", "$db_password");
	}
catch(PDOException $e)
	{
	echo $e->getMessage();
	}

echo '<!DOCTYPE html>';
echo '<html>';
echo '<body>';

$sql = "create table teams(
Team_ID int primary key not null auto_increment,
Teamname varchar(20)
);";
$pdo->query($sql);

$sql = "create table events(
Event_ID int primary key not null auto_increment,
Name varchar(20),
Beschreibung varchar(40),
Sichtbarkeit tinyint not null default 0
);";
$pdo->query($sql);

$sql = "create table benutzer(
Benutzer_ID int primary key not null auto_increment,
Name varchar(20),
Vorname varchar(20),
Geburtsdatum date,
Passwort varchar(20) not null,
email varchar(20) not null,
Team_ID int,
foreign key(Team_ID) references Teams(Team_ID)
);";
$pdo->query($sql);

$sql = "create table aktivitaeten(
Aktivitaets_ID int primary key not null auto_increment,
Benutzer_ID int,
foreign key(Benutzer_ID) references benutzer(Benutzer_ID),
Event_ID int,
foreign key(Event_ID) references events(Event_ID),
Dauer int,
Distanz int,
Datum date
);";
$pdo->query($sql);

echo '</body>';
echo '</html> ';

?>
