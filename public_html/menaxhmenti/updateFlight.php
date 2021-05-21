<?php
 require_once('../../resources/config.php');
 include(databaza);
 $db=new database();

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
     $fid=$_POST['id'];
     $origin=$_POST['origin'];
     $destination=$_POST['destination'];
     $flight_date=date('Y-m-d',strtotime($_POST['flight_date']));;
     $flight_return=date('Y-m-d',strtotime($_POST['flight_return']));;
     $qmimi=$_POST['Qmimi'];


     $sql="UPDATE  flights SET origin='$origin',destination='$destination',flight_date='$flight_date',flight_return='$flight_return',
     Qmimi='$qmimi' WHERE id='$fid';";
     echo $sql;
     if($db->executeData($sql))
     {
         header("Location:tabelaFluturimeve.php");
     
     }
 }


?>