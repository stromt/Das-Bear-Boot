<?php
	$klassekode=$_GET["klassekode"];
	$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/student1.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn,$filoperasjon) or die ("Klarer ikke åpne nødvendig fil.");
	
	print ("Disse studentene hører til klasse $klassekode <br> <br>");
	
	while ($linje=fgets($fil))
	{
		if($linje !="")
		{
			$del = explode (";", $linje);
		
			
			if($klassekode==trim($del[3]))
			{
				print("$del[0], $del[1], $del[2], $del[3] </br>");
			}
			
		}
	}
	
	fclose($fil); 
?>