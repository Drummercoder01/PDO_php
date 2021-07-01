<?php

try{
  
 /*************** deel 1 : Connectie *************/

// db connectie
 $_PDO = new PDO('mysql:host=localhost; port=3306; dbname=db_school_06',
                 "root", 
                 "");


// error reporting
$_PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/********** deel 2.a : Query versturen **********/
// Query naar DB sturen
$_result = $_PDO -> query("SELECT d_gemeenteNaam FROM t_gemeente;");


/********* deel 2.b : resultaat verwerken ******/
if ($_result -> rowCount() > 0)
{
  While ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
  {
    echo  $_row['d_gemeenteNaam'] ."</br>";
  }
}
else
{
  // er moet minstens één gemeente in de db staan
  throw new Exception("DB-Inconsistency");
}
  
}
catch (Exception $_e)
{
  echo exceptionMessage($_e);
}
?>
