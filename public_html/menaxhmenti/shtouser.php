<?php

 require_once("../../resources/config.php");

 require_once("../../resources/classes/User.class.php");
 include(databaza);

 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST")
  {
      if($_POST['isManager']=="on")
       {
           $isManager=1;
       }
       else {
           $isManager=0;
       }
      $user=new User($_POST['emri'],$_POST['mbiemri'],$_POST['email'],$_POST['password'],$isManager);
      if(insertUser($db,$user))
       { 
        //echo "Perdoruesi u shtua me sukses";
            header("Location:tabelaPerdoruesit.php");
       }
       else {
           echo "error";
       }

  }

  
?>



