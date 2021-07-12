<?php

//*******Initialisatie

//algemene initialisatie
$_srv= $_SERVER['PHP_SELF'];

// database connection en selection
include("../connections/pdo.inc.php");


//****verwerking
//***** formulier aanmaken

if(! isset($_POST["submit"]))
//formulier klaar maken
{  
	$_output="
	<h1>Gemeente Zoeken</h1>
	<form method=POST action=$_srv>
	<label>Postcode: </label>
	<input type= text name= postcode>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type= submit name= submit value= Zoek de Gemeente>
	</form>
	<hr>";
}
else
{
//***** formulier verwerken
	
	$_postcode=$_POST['postcode'];
	
//***** input verwerking
	
	$_output="<h2>Resultaat</h2>";
	
//Query aanmaken
	$_query= "
	SELECT d_gemeenteNaam
	FROM t_gemeente
	WHERE d_postnummer= '$_postcode';";

//Query versturen
	$_result= $_PDO->query($_query);
	
//Query resultaat verwerken
	if ($_result->rowCount() > 0)
	{
		while ($_row= $_result -> fetch(PDO::FETCH_ASSOC))
		{
			$_output.= "$_postcode --".$_row['d_gemeenteNaam']."<br>";
		}
	}
	else
	{
// opgelet als de gemeente niet gevonden word is dat GEEN fout
		
		$_output.= "Geen gemeente voor postcode -- $_postcode";
	}
	$_output.="<hr><a href=$_srv>Opnieuw</a>";
	
}

///***********output

echo $_output;

?>