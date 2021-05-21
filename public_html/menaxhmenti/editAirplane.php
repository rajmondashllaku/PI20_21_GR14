<?php


 require_once('../../resources/config.php');
include(databaza);
 $bootstrap="../../css/bootstrap.min.css";
 $css_includes="../../css/update.css";
 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    echo $id;
    $sql="SELECT * from airplanes where id=%d";
    $rezultati=$db->getData($sql,$id);
    $aname=$rezultati[0]['aname'];
    $cruisingrange=$rezultati[0]['cruisingrange'];
   
     
 }
 include(templates_dashboard_header);
 ?>


<div style="position:absolute;left:200%;width:100%;top:30%;display:block;" id="shtofluturime">
        <h2>Update Fluturim</h2>
       <form action="updateAirplane.php" method="post">
         <label for="origin">Emri:
          <input type="text" name="aname" id="aname" value="<?php echo $aname ?>"> 
         </label><br/>
          <label for="destination">Gjatesia per Fluturim:
          <input type="text" name="cruisingrange" id="cruisingrange" value="<?php echo $cruisingrange?>">
          </label><br/>
         <input type="hidden" name="aid" value="<?php echo $id?>">
         <input type="submit" name="submit" value="Update">

          
      </form>
</div>
