<?php
include("start.html");
?>
<h3>Registrer Yrkesgruppe</h3>
<form method="post" action="" id="registrerPoststedSkjema" name="registrerPoststedSkjema" onsubmit="return validateForm()">
	Yrkesgruppe: <input type="text" name="yrkesgruppe" id="yrkesgruppe" placeholder="Skriv her" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" required /><br />
	<input type="submit" value="Fortsett" id="fortsett" name="registreringsknapp" />
	<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /><br/>
	<div id="melding"></div>
<?php
@$registreringsknapp=$_POST["registreringsknapp"];
if($registreringsknapp)
{
	$yrkesgruppe=$_POST["yrkesgruppe"];
	$yrkesgruppe=trim($klassenavn);

	if (!$yrkesgruppe)
{
		print ("Feltene må fyldes ut");	
}
	else 
{
		$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/YRKESGRUPPE.txt";
		$filoprasjon="a";
		$fil=fopen ($filnavn,$filoprasjon);
		$linje=$klassenavn.";".$klassekode."\n";
		fwrite ($fil,$linje);
		fclose ($fil);
		print ("$yrkesgruppe er registrert som en yrkesgruppe.");
	}
}
include("slutt.html");
?>
