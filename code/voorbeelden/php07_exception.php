<?php
try
{
/***************************************
*Initialisatie
****************************************/
 
$_srv = $_SERVER['PHP_SELF'];
 

// database connection en selection
  include("../connections/pdo.inc.php");
  
 
/*******************************************
*    Input en verwerking
********************************************/
// aantal gemeenten in Belgie
$_query= "select count(*) AS aantal from t_gemeente";

$_result = $_PDO -> query($_query);

if ($_result -> rowCount() > 0)
{
  while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
  {
    $_output= $_row['aantal'];
  }
}
else
 
{
  // er moet minstens één rij in het resultaat staan
  throw new Exception("DB-Inconsistency");
}




echo $_output;
}

catch (Exception $_e) // exception handling
{
   include("../php_lib/myExceptionHandling.inc.php"); 
   echo myExceptionHandling($_e,"../logs/error_log.csv"); 
}

?>
