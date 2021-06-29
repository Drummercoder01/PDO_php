 <?php
/*************** deel 1 : Connectie *************/
// db connectie
 $_PDO = new PDO('mysql:host=localhost; port=3306; dbname=db_school_06',"root", "");


// error reporting
$_PDO -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



/********** deel 2.a : Query versturen **********/
$_result = $_PDO -> query("
        SELECT d_voornaam,d_naam 
        FROM t_lesgevers 
        WHERE d_naam='De Pauw';");

/********* deel 2.b : resultaat verwerken ******/
while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
{
 echo  $_row['d_voornaam'] .
       "&nbsp;".
       $_row['d_naam']."</br>";
}


?>
