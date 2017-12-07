<?php
include("start.html");
?>
	<h3>Klasseliste</h3>
	<form method="post" action="" id="registrerPoststedSkjema" name="registrerPoststedSkjema" onsubmit="return validateForm()">
	Klassekode <input type="text" id="klassekode" name="klassekode" placeholder="Fyll ut" onFocus="fokus(this)" onBlur="mistetFokus(this)" 
		onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="endreTilStoreBokstaver(this)" required /><br/>
	<input type="submit" value="Fortsett" id="fortsett" name="registreringsknapp" />
	<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /><br/>
	</form>
	<div id="melding"></div>
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
$klassekode=$_POST["klassekode"];
$klassekode=trim($klassekode);
$klassekode=strtoupper($klassekode);
$filnavn="D:\\sites\\home.hbv.no\\146797\\146797/student1.txt";
$filoprasjon="r";
$fil=fopen ($filnavn,$filoprasjon);

if (!$klassekode)
{
	print ("Feltene må fyldes ut");	
}
else if (strlen($klassekode)!=3)
{
	print ("Ugyldig mengde tegn i klassekoden");
}

while ($linje=fgets($fil))
{
	
	if ($linje !="")
	{
		$del=explode(";",$linje);
		$brukernavn=trim($del[0]);
		$fornavn=trim($del[1]);
		$etternavn=trim($del[2]);
		$klasse=trim($del[3]);
		if ($klassekode==$klasse)
		{
		print ("$klasse, $fornavn, $etternavn, brukernavn: $brukernavn<br/>");
		}
		
	}
}
fclose($fil);	
}
include("slutt.html");
?>