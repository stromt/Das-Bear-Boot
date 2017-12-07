<?php
include("start.html");
?>
<h3>Registrer student</h3>
	<form method="post" action="" id="registrerPoststedSkjema" name="registrerPoststedSkjema" onsubmit="return validateForm()">
Fornavn <input type="text" id="fornavn" name="fornavn" placeholder="Fyll ut" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)" required /><br/>
Etternavn <input type="text" id="etternavn" name="etternavn" placeholder="Fyll ut" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)" required /><br/>
Brukernavn <input type="text" id="brukernavn" name="brukernavn" placeholder="Fyll ut" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)" /><br/>
Klassekode <input type="text" id="klassekode" name="klassekode" placeholder="Fyll ut" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onkeyup="visKlasse(this.value)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)" required /><br/>
<input type="submit" value="Fortsett" id="fortsett" name="registreringsknapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /><br/>
<div id="melding"></div>
</form>
	<script src="validering.js"></script>
	<script src="ajax.js"></script>
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
$fornavn=$_POST["fornavn"];
$etternavn=$_POST["etternavn"];
$klassekode=$_POST["klassekode"];
$klassekode=strtoupper($klassekode);
$fornavn=trim($fornavn);
$etternavn=trim($etternavn);
$tegn1=$klassekode[0];
$tegn2=$klassekode[1]; 
$tegn3=$klassekode[2];
if (!$fornavn || !$etternavn) 
{
		print ("Begge må fylles ut");
}

else if (strlen($klassekode)!=3)
{
	print ("Ugyldig mengde tegn i klassekoden");
}

else if ($tegn1<"A" || $tegn1>"Z" || $tegn2<"A" || $tegn2>"Z" || $tegn3<"1" || $tegn3>"9")
		{
			print ("Klassekode er ugyldig, minst ett tegn er feil");
		}
else 
{

	$brukernavn=$fornavn[0].$etternavn[0];
	$brukernavn=strtoupper($brukernavn);
	$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/student1.txt";
	$filoprasjon="a";
	$fil=fopen ($filnavn,$filoprasjon);
	$linje=$brukernavn.";".$fornavn.";".$etternavn.";".$klassekode."\n"; 
	fwrite ($fil,$linje);
	fclose ($fil);
	print ("$fornavn $etternavn er nå registrert som student med brukernavn: $brukernavn");
}
}
include("slutt.html");
?>
