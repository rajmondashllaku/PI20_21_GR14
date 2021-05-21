<?php
 require_once('../../resources/config.php');

 include(databaza);

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    $db=new database();

    $sql="DELETE FROM user where id=%d";

    if($db->executeData($sql,$id))
    {
        header("Location:tabelaPerdoruesit.php");
    }
    

}

?>