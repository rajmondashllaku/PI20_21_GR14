<?php
 
 require_once("../../resources/config.php");

 require_once("../../resources/classes/Airplane.class.php");
 include(databaza);

 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST")
  {
    if(isset($_POST['cruisingrange']))
    {
        $airplane=new Airplane($_POST['aname'],$_POST['cruisingrange']);
      if(insertAirplane($db,$airplane))
        header("Location:tabelaAeroplanet.php");
      else{
          echo "error";
      }


    }
    else{
        $airplane=new Airplane($_POST['aname']);
       if(insertAirplane($db,$airplane))
        header("Location:tabelaAeroplanet.php");
       else {
           echo "error";
       } 
    }
  }
  




?>