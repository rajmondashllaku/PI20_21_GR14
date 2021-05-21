<?php
 require_once('../../resources/config.php');
 include(databaza);
 $db=new database();

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
     $aid=$_POST['id'];
     $aname=$_POST['aname'];
     $cruisingrange=$_POST['cruisingrange'];

     $sql="UPDATE  airplanes SET aname='$aname',cruisingrange='$cruisingrange' WHERE id='$aid';";
     echo $sql;
     if($db->executeData($sql))
     {
         header("Location:tabelaAeroplanet.php");
     
     }
 }


?>