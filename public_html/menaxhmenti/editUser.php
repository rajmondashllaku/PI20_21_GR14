<?php


 require_once('../../resources/config.php');
include(databaza);
 $bootstrap="../../css/bootstrap.min.css";
 $css_includes="../../css/update.css";
 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    echo $id;
    $sql="SELECT * from user where id=%d;";
    $rezultati=$db->getData($sql,$id);
    $emri=$rezultati[0]['emri'];
    $mbiemri=$rezultati[0]['mbiemri'];
    $email=$rezultati[0]['email'];
   
     
 }
 include(templates_dashboard_header);
 ?>


<div style="position:absolute;left:200%;width:100%;top:100%;display:block;" id="shtouser">
      <form action="updateUser.php" method="post">
         <label for="emri">Emri:
          <input type="text" name="emri" id="emri" value="<?php echo $emri ?>">
         </label><br/>
          <label for="mbiemri">Mbiemri:
          <input type="text" name="mbiemri" id="mbiemri" value="<?php echo $mbiemri?>">
          </label><br/>
          <input type="hidden" name="uid" value="<?php echo $id?>">

          <label>Email:
          <input type="email"  name="email" id="email" value="<?php echo $email?>">
          </label><br/> 
          <input type="submit" value="Update User" name="submit">
      </form>
</div>
