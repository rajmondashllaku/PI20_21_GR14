<?php


 require_once('../../resources/config.php');

 require_once("../../resources/classes/User.class.php");
 include(databaza);

 $bootstrap="../../css/bootstrap.min.css";
 $css_includes=Array("../../css/update.css","../../css/tableMenaxhim.css");
 include(templates_dashboard_header);
 ?>
  <script>

document.getElementById('fluturim').addEventListener('click',shtodiv1);
document.getElementById('user').addEventListener('click',shtodiv2);
document.getElementById('aeroplan').addEventListener('click',shtodiv3);

function shtodiv1()
{
    document.getElementById('rina').style.display="none";
      document.getElementById('shtofluturime').style.display="block";
      document.getElementById('shtouser').style.display="none";
      document.getElementById('shtoaeroplan').style.display="none";
}
function shtodiv2()
{document.getElementById('rina').style.display="none";
      document.getElementById('shtouser').style.display="block";
      document.getElementById('shtofluturime').style.display="none";
      document.getElementById('shtoaeroplan').style.display="none";
}
function shtodiv3()
{document.getElementById('rina').style.display="none";
      document.getElementById('shtofluturime').style.display="none";
      document.getElementById('shtouser').style.display="none";
      document.getElementById('shtoaeroplan').style.display="block";
      
}

</script>
<div style="position:absolute;left:150%;width:100%;top:0%;"  id="rina" >

                <input type='hidden' id='userId' name='useriId'>
                <table class='tabela' cellspacing='0' style="align-items:center;">
                    <thead>
                        <th style="align:left">Emri</th>
                        <th style="align:left">Mbiemri</th>
                        <th style="align:left">Email</th>
                        <th style="align:left">A eshte Admin</th>
                    </thead>
                    <?php 
				$db=new database();
                $rez = $db->getData("Select * From user order by id");

                foreach ($rez as $rreshti) {
                    echo "<form method=\"POST\"><tr><td>".$rreshti['emri']."</td><td>".$rreshti['mbiemri']."</td><td>".$rreshti['email']."</td><td>".$rreshti['isManager']."</td><td><input type=\"hidden\" name=\"id\" value=\"".$rreshti['id']."\"></td> <td style='text-align: center'>"                       
                    . "<input type='submit' formaction=\"editUser.php\" value='Edit' class='button button-small id-submit' id='id_".$rreshti['id']."'></td>
                    <td><input type='submit' value='Delete' formaction=\"deleteUser.php\" class='button button-small id-submit' id='id_".$rreshti['id']."'></td></tr></form>";
                }
                ?>
                </table>
</div>
<div style="position:absolute;left:200%;width:100%;top:30%;display:none;" id="shtofluturime">
        <h2>Shto Fluturim</h2>
       <form action="shtofluturim.php" method="post">
         <label for="origin">Prej:
          <input type="text" name="origin" id="origin">
         </label><br/>
          <label for="destination">Deri:
          <input type="text" name="destination" id="destination">
          </label><br/>

          <label>Data:
          <input type="date"  name="flight_date" id="flight_date">
          </label><br/>
          <label for="flight_return">Data e kthimit
          <input type="date" name="flight_return" id="flight_return"> 
          </label><br/>
          <label>Qmimi
          <input type="number" name="qmimi" required></label></br>
          <input type="submit" name="submit" value="Krijo fluturim">
          
      </form>
</div>
<div style="position:absolute;left:200%;width:100%;top:30%;display:none;" id="shtouser">
       <h2>Shto user</h2>
   <form action="shtouser.php" method="post">
         <label for="emri">Emri:
          <input type="text" name="emri" id="emri">
         </label><br/>
          <label for="mbiemri">Mbiemri:
          <input type="text" name="mbiemri" id="mbiemri">
          </label><br/>

          <label>Email:
          <input type="email"  name="email" id="email">
          </label><br/>
          <label for="password">Password:
          <input type="password" name="password" id="password"> <br/>
          <label for="radio">Shto si Menaxher</label>
          <input type="radio" name="isManager" id="radio">
         <br/>
         <input type="submit" value="Krijo" name="submit">
      </form>
</div>

<div style="position:absolute;left:200%;width:100%;top:100%;display:none;" id="shtoaeroplan">
    <h1>Shto Aeroplan</h1>
      <form action="shtoaeroplan.php" method="post">
         <label for="emri">Emri i Aeroplanit:
          <input type="text" name="aname" id="emri">
         </label><br/>
          <label for="mbiemri">Gjatesia e fluturimit:
          <input type="number" name="cruisingrange" id="cruisingrange">
          
          </label><br/>
          <input type="submit" name="submit" value="Shto">
      </form>
</div>