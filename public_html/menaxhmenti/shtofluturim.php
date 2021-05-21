<?php
 
 require_once("../../resources/config.php");

 require_once("../../resources/classes/Flight.class.php");
 include(databaza);

 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $date=date('Y-m-d',strtotime($_POST['flight_date']));
    if(empty($_POST['flight_return'])){

      $flight=new Flight($_POST['origin'],$_POST['destination'],$date,$_POST['qmimi']);
      if(insertFlight($db,$flight))
       { 
            echo "Fluturimi u shtua me sukses";
            header("Location:tabelaFluturimeve.php");   
           // header("Location:index.php");
       }
       else {
           echo "error";
       }

  }
  else {
      $datereturn=date('Y-m-d',strtotime($_POST['flight_return']));
    $flight=new Flight($_POST['origin'],$_POST['destination'],$date,$datereturn,$_POST['qmimi']);
    if(insertFlight($db,$flight))
     { 
          echo "Fluturimi u shtua me sukses";
          header("Location:tabelaFluturimeve.php");
         // header("Location:index.php");
     }
     else {
         echo "error";
     }


  }
}




?>