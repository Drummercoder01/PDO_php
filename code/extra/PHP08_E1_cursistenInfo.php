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
    <h1>Cursisten info</h1>
    <form method=POST action=$_srv>
      <label>Naam: </label>
      <input type =text name=naam >
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type=submit name=submit value='verstuur'>
    </form>
    <hr>";  
}

else 
{ 
  $_output="<h2>Resultaat</h2>";
// inhoud formulier verwerken
  $_naam=$_POST['naam'];
   
// Query naar DB sturen
  $_result = $_PDO -> query("
   SELECT d_naam, d_voornaam, d_straat 
   FROM t_cursisten 
   WHERE d_naam = '$_naam';");


//resultaat van de query verwerken  
  if ($_result -> rowCount() > 0)
  {
    While ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
    {
      $_output.="voornaam &amp; naam : ". $_row["d_voornaam"]."&nbsp;&nbsp;". $_row["d_naam"]."<br>".
			"straat: ". $_row["d_straat"]."<br>";
    }
  }
  else
  {
  // opgelet als de gemeente niet gevonden wordt is dat GEEN fout
    $_output.=  "De cursist met de naam &quot;$_naam&quot; staat niet in onze database";
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