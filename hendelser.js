function fokus(element)
{
  element.style.background="yellow";
}  


function mistetFokus(element)
{
  element.style.background="white";

}  


function musInn(element)
{
	document.getElementById("melding").style.color="blue";
  if (element==document.getElementById("klassekode"))
    {
      document.getElementById("melding").innerHTML="Klassekode skal best&aring; av to store bokstaver og ett siffer";
    }
  if (element==document.getElementById("klassenavn"))
    {
      document.getElementById("melding").innerHTML="Klassenavn m&aring; fylles ut";
    }
	if(element==document.getElementById("brukernavn"))
	{
		document.getElementById("melding").innerHTML="Fyll inn brukernavn";
	}
	if(element==document.getElementById("klassenavn"))
	{
		document.getElementById("melding").innerHTML="Fyll inn klassenavn";
	}
	if(element==document.getElementById("fornavn"))
	{
		document.getElementById("melding").innerHTML="Fyll inn fornavn";
	}
	if(element==document.getElementById("etternavn"))
	{
		document.getElementById("melding").innerHTML="Fyll inn etternavn";
	}
}  


function musUt()
{
  document.getElementById("melding").innerHTML="";   
}  


function endreTilStoreBokstaver(element)
{
  element.value=element.value.toUpperCase();
}  


function settFokus(element)
{
  element.focus();
} 