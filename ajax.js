function visKlasse(klassekode)
{
  var foresporsel=new XMLHttpRequest(); 
  
  foresporsel.onreadystatechange=function() 
    {
      if (foresporsel.readyState==4 && foresporsel.status==200)  
        {
          document.getElementById("melding").innerHTML=foresporsel.responseText;  
        }
    }

  foresporsel.open("GET","ajaxvis.php?klassekode="+klassekode);  
  foresporsel.send();  
}