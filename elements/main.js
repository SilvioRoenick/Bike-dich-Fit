window.onload = start;

function start()
{
	document.getElementById("upUserEmail").onchange = ChkUpUserEmail;
	document.getElementById("upUserName").onchange = ChkUpUserName;
	document.getElementById("upUserVorname").onchange = ChkUpUserVorname;
	
	// document.getElementById("upAktualisieren").onmouseover = ChkUpAktualisieren;
}

// auf bool umschreiben

function ChkUpUserEmail()
{
	var msg = "";
	eingabe = document.getElementById("upUserEmail").value;
	if(eingabe.length > 10)
	{
		var msg = "<b>Keine gültige Eingabe!<\/b>";
	}
	document.getElementById('upUserEmailMsg').innerHTML = msg;
}

function ChkUpUserName()
{
	var msg = "";
	eingabe = document.getElementById("upUserName").value;
	if(eingabe.length > 10)
	{
		var msg = "<b>Keine gültige Eingabe!<\/b>";
	}
	document.getElementById('upUserNameMsg').innerHTML = msg;
}

function ChkUpUserVorname()
{
	var msg = "";
	eingabe = document.getElementById("upUserVorname").value;
	if(eingabe.length > 10)
	{
		var msg = "<b>Keine gültige Eingabe!<\/b>";
	}
	document.getElementById('upUserVornameMsg').innerHTML = msg;
}

function ChkUpAktualisieren()
{
	ChkUpUserEmail();
	ChkUpUserName();
	ChkUpUserVorname();
	
	var eins = document.getElementById('upUserEmailMsg');
	document.getElementById('upUserVornameMsg').innerHTML = eins;
	if(eins != null)
	{
		document.getElementById("upAktualisieren").disabled = true; 
	}
	else
	{
		document.getElementById("upAktualisieren").disabled = false; 
	}
	
}