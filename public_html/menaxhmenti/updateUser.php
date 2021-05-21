<?php

require_once('../../resources/config.php');
 include(databaza);
 $db=new database();

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
     $uid=$_POST['id'];
     $emri=$_POST['emri'];
     $mbiemri=$_POST['mbiemri'];
     $email=$_POST['email'];
     echo $uid.$emri.$mbiemri.$email;
     
     $sql="UPDATE user SET emri='$emri',mbiemri='$mbiemri',email='$email' WHERE id='';";
     echo $sql;
     if($db->executeData($sql))
     {
         header("Location:tabelaPerdoruesit.php");
     
     }
 }

 ?>
