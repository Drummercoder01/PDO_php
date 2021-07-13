<?php
try
{
/***************************************
*Initialisatie
****************************************/
  
$_srv = $_SERVER['PHP_SELF'];
 
// exception handling funtions 
 
// database connection en selection
  include("../connections/pdo.inc.php");
  
  
/*******************************************
*    Input en verwerking
********************************************/

if (! isset($_POST["submit"]))  
    // formulier klaar maken
{
  $_output= "
    <h1>Gemeente Zoeken</h1>
    <form method=POST action=$_srv>
      <label>Postcode : </label>
      <input type =text name=postcode >
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type=submit name=submit value='Zoek de gemeente'>
    </form>
    <hr>";  
}

else 
{ 
  $_output="<h2>Resultaat</h2>";
// inhoud formulier verwerken
  $_postcode=$_POST['postcode'];
   
// Query naar DB sturen
  $_result = $_PDO -> query("
   SELECT d_gemeenteNaam 
   FROM t_gemeente 
   WHERE d_postnummer = '$_postcode';");


//resultaat van de query verwerken  
  if ($_result -> rowCount() > 0)
  {
    While ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
    {
      $_output.= "$_postcode -- ". $_row['d_gemeenteNaam']."<br>";
    }
  }
  else
  {
  // opgelet als de gemeente niet gevonden wordt is dat GEEN fout
    $_output.=  "Geen gemeente voor postcode -- $_postcode";
  }
 $_output.="<hr><a href=$_srv>Opnieuw</a>";
}

/*********************************************
*    output
**********************************************/

  echo $_output; 
}

catch (Exception $_e) // exception handling
{
	 include("../php_lib/myExceptionHandling.inc.php"); 
   echo myExceptionHandling($_e,"../logs/error_log.csv");
}

?>