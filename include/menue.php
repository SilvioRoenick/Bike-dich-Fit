<?php

echo '<nav>';
echo '<ul>';
echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>';
echo '<li><a href="?reqs=home">Home</a></li>';
echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>';

echo '<li class="submenu"><a href="?reqs=xxx">Events</a>';
echo '<ul>';

$sql = "SELECT * FROM events WHERE Sichtbarkeit BETWEEN 10 AND 19";
foreach ($pdo->query($sql) as $row)
{
	$event = $row['Name'];
	$eventId = $row['Event_ID'];
	echo '<li><a href="?reqs=eventview&id='.$eventId.'">'.$event.'</a></li>';
}

if ( $_SESSION['login'] == true )
{
	$sql = "SELECT * FROM events WHERE Sichtbarkeit BETWEEN 20 AND 29";
	foreach ($pdo->query($sql) as $row)
	{
		$event = $row['Name'];
		$eventId = $row['Event_ID'];
		echo '<li><a href="?reqs=eventview&id='.$eventId.'">'.$event.'</a></li>';
	}
}



if ( $_SESSION['login'] == true )
{
	echo '<li><a href="?reqs=eventedit">Event anlegen & bearbeiten</a></li>';
}
echo '</ul>';
echo '</li>';

echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>';
if ( $_SESSION['login'] == true )
{
	echo '<li><a href="?reqs=userprofil">Userprofil</a></li>';
}
else
{
	echo '<li><a href="?reqs=registrieren">Registrieren</a></li>';
}
echo '<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>';
if ( $_SESSION['login'] == true )
{
	echo '<li><a href="?reqa=logout">Logout</a></li>';
}
else
{
	echo '<li><a href="?reqs=login">Login</a></li>';
}
echo '</ul>';
echo '</nav>';	

?>