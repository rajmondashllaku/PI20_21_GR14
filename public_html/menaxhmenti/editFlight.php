<?php


 require_once('../../resources/config.php');
include(databaza);
 $bootstrap="../../css/bootstrap.min.css";
 $css_includes="../../css/update.css";
 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    echo $id;
    $sql="SELECT * from flights where id=%s";
    $rezultati=$db->getData($sql,$id);
    $origin=$rezultati[0]['origin'];
    $destination=$rezultati[0]['destination'];
    $flight_date=$rezultati[0]['flight_date'];
    $flight_return=$rezultati[0]['flight_return'];
    $qmimi=$rezultati[0]['Qmimi'];
    var_dump($rezultati);
     
 }
 include(templates_dashboard_header);
 ?>


<div style="position:absolute;left:200%;width:100%;top:30%;display:block;" id="shtofluturime">
        <h2>Update Fluturim</h2>
       <form action="updateFlight.php" method="post">
         <label for="origin">Prej:
          <input type="text" name="origin" id="origin" value="<?php echo $origin ?>"> 
         </label><br/>
          <label for="destination">Deri:
          <input type="text" name="destination" id="destination" value="<?php echo $destination?>">
          </label><br/>
         <input type="hidden" name="fid" value="<?php echo $id?>">
          <label>Data:
          <input type="date"  name="flight_date" id="flight_date" value="<?php echo $flight_date?>">
          </label><br/>
          <label for="flight_return">Data e kthimit
          <input type="date" name="flight_return" id="flight_return" value="<?php echo $flight_return?>"> 
          </label><br/>
          <label>Qmimi
          <input type="number" name="qmimi" value="<?php echo $qmimi ?>"></label></br>
          <input type="submit" name="submit" value="Update fluturim">
          
      </form>
</div>

