<?php
try
{
/***************************************
*Initialisatie
****************************************/	
    
$_PDO =new PDO('mysql:host=localhost; port=3306; dbname=db_school_06', "root","");
    
$_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$_result= $_PDO->query("SELECT d_gemeenteNaam FROM t_gemeente;");
    
if ($_result-> rowCount()>0)
{
    while ($_row= $_result->fetch(PDO::FETCH_ASSOC))
    {
        echo $_row['d_gemeenteNaam']."</br>";
    }
}

else
{
    throw new Exception("DB-Inconsistency");
}
}
catch(Exception $_e)
{
    echo exceptionMessage($_e);
}
    
    
?>
