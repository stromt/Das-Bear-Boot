<?php
include("start.html");
$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/student1.txt";
$filoprasjon="r";
$fil=fopen ($filnavn,$filoprasjon);
while ($linje=fgets($fil))
{
	if ($linje !="")
	{
		$del=explode(";",$linje);
		$brukernavn=$del[0];
		$fornavn=$del[1];
		$etternavn=$del[2];
		$klassekode=$del[3];
		print ("$klassekode, $fornavn, $etternavn, brukernavn: $brukernavn<br/>");
	}
}	
fclose($fil);
include("slutt.html");
?>