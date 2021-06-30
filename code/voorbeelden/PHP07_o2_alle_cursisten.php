<?php
/*************** deel 1 : Connectie *************/

// db connectie
 $_PDO = new PDO('mysql:host=localhost; port=3306; dbname=db_school_06',"root","");


// error reporting
$_PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




/********** deel 2.a : Query versturen **********/

$_result = $_PDO -> query("SELECT * FROM t_cursisten;");

/********* deel 2.b : resultaat verwerken ******/
if ($_result -> rowCount() > 0)
{
  echo "<table border=1>";
  while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
  {
    echo  "<tr><td>".$_row['Cursist_VN']."</td><td>".$_row['Cursist_AN']."</td><td>".$_row['Postcode']."</td><td>".$_row['Gemeente']."</td></tr>";
  }
  echo "</table>";
}
else
{
    echo "Geen records gevonden";
}


?>
