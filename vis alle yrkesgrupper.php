<?php
include("start.html");
$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/klasse.txt";
$filoprasjon="r";
$fil=fopen ($filnavn,$filoprasjon);
while ($linje=fgets($fil))
{
	if ($linje !="")
	{
		$del=explode(";",$linje);
		$klassenavn=$del[0];
		$klassekode=$del[1];
		print ("$klassekode; $klassenavn<br/>");
	}
}	
fclose($fil);
include("slutt.html");
?>
