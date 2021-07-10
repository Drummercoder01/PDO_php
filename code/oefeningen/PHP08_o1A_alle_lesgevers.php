<?php
//******* initialisatie 
$_output="";

// db connectie
$_PDO = new PDO('mysql:host=localhost; dbname=db_school_06',
								"root", 
								"");

// error reporting
$_PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//******* verwerking

//query versturen
$_query = "SELECT * FROM t_lesgevers;";
$_result = $_PDO -> query($_query);

//resultaat verwerken 
while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
{
	$_output.=$_row['d_voornaam']."&nbsp;".$_row['d_naam']."</br>";
}

//******* output
echo $_output;
?>
