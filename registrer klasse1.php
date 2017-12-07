<?php
include("start.html");
?>
<h3>Registrer klasse</h3>
<form method="post" action="" id="registrerPoststedSkjema" name="registrerPoststedSkjema" onsubmit="return validateForm()">
	Klassenavn: <input type="text" name="klassenavn" id="klassenavn" placeholder="Skriv her" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" required /><br />
	Klassekode: <input type="text" name="klassekode" id="klassekode" placeholder="Skriv her" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)" required /><br />
	<input type="submit" value="Fortsett" id="fortsett" name="registreringsknapp" />
	<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /><br/>
	<div id="melding"></div>
</form>
	<script src="validering.js"> </script>
	<script>
function validateForm(){
    var klassekode = document.getElementById('klassekode').value;
    if (klassekode.length!=3)
	{
		document.getElementById("melding").style.color="red";	
        document.getElementById("melding").innerHTML="Klassekode har ikke 3 tegn";
        return false;
    }
	else
	{
	tegn1=klassekode.substr(0,1);
    tegn2=klassekode.substr(1,1);
    tegn3=klassekode.substr(2,1);
	    if (tegn1 < "A" || tegn1 > "Z" || tegn2 < "A" || tegn2 > "Z" || tegn3 < "1" || tegn3 > "9")
      {
		document.getElementById("melding").style.color="red";	
        document.getElementById("melding").innerHTML="Klassekode har minst et utlovlig tegn";
		return false;
      }
	}
  return true;
}
</script>
<?php
@$registreringsknapp=$_POST["registreringsknapp"];
if($registreringsknapp)
{
	$klassenavn=$_POST["klassenavn"];
	$klassekode=$_POST["klassekode"];
	$klassekode=strtoupper($klassekode);
	$klassenavn=trim($klassenavn);
	$tegn1=$klassekode[0];
	$tegn2=$klassekode[1]; 
	$tegn3=$klassekode[2];

	if (!$klassenavn || !$klassekode)
{
		print ("Feltene må fyldes ut");	
}
	else if (strlen($klassekode)!=3)
{
		print ("Ugyldig mengde tegn i klassekoden");
}
	else if 	($tegn1<"A" || $tegn1>"Z" || $tegn2<"A" || $tegn2>"Z" || $tegn3<"1" || $tegn3>"9")
		{
				print ("Klassekode er ugyldig, minst ett tegn er feil");
		}
	else 
{
		$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/klasse.txt";
		$filoprasjon="a";
		$fil=fopen ($filnavn,$filoprasjon);
		$linje=$klassenavn.";".$klassekode."\n";
		fwrite ($fil,$linje);
		fclose ($fil);
		print ("$klassenavn er nå registrert med klassekode $klassekode");
	}
}
include("slutt.html");
?>
