<?php
//******initialisatie
$_output="";

//db conectie
$_PDO =new PDO('mysql:host=localhost; port=3306; dbname=db_school_06', "root","");

// error reporting
$_PDO ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//****** VERWERKING

//query versturen
$_query = "SELECT d_voornaam, d_naam FROM t_lesgevers WHERE d_naam = 'De Pauw';";
$_result = $_PDO -> query($_query);

//resultaat verwerken
while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
{
    $_output.=$_row['d_voornaam']."&nbsp;".$_row['d_naam']."</br>";
}

//*******output
echo $_output;
?>