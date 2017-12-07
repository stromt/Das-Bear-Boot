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