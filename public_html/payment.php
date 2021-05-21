<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
  header("Location: llogin.php");
}     


$db=new database();
echo $db->connect();

$msgError=$email=$machErr="";
$query="SELECT * From flights where id=%s";
$rezultati=$db->getData($query,$_GET['id']);

$ticketInfo="Perdoruesi me email:".$_SESSION['email']." ka blere bileten me te dhena si ne vijim:\n";
$flightInfo=implode(' ',$rezultati[0]);
$flightInfoArray=explode(' ',$flightInfo);
$ticketInfo.="Id e fluturimit:".$flightInfoArray[0]."\n";
$ticketInfo.="Origjina e fluturimit:".$flightInfoArray[1]."\n";
$ticketInfo.="Destinacioni i fluturimit:".$flightInfoArray[2]."\n";
$ticketInfo.="Data e nisjes:".$flightInfoArray[3]."\n";
$ticketInfo.="Data e kthimit:".$flightInfoArray[4]."\n";
$ticketInfo.="Qmimi i fluturimit:".$flightInfoArray[5]."\n";



?>
<script>

  function shfaqKushtet(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("divkushtet").style.display="block";
    }
    else {
      document.getElementById("divkushtet").style.display="none";
    }
    
   }
   
  </script>

<?php
  $css="../css/registration.php";
  $header_css="../css/style2.css";

include_once(header_user);
?>


<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Formulari per Pagese</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" action="paymentInfo.php">
       
          <div class="input_field"></span>
            
            <input type="text" style="border:  1px solid #cccccc"id="email" name="name_on_card" placeholder="Name on Card" onblur="isEmailValid(this.value)"/>
            <p id="paragrafi" style="display:none;font-size:10px;text-align:center;color:red"></p>
          
          </div>
          <div class="input_field"> 
            <input type="text" name="card_number" placeholder="Card Number"  />
            <input type="hidden" name="info" value="<?php echo $ticketInfo?>">
          </div>
        
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> </i></span>
                <input type="month" style="width=30px" name="data_skadimit" />
                
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> </span>
                <input type="text" name="CVV" placeholder="CVV"  />
              </div>
            </div>
          </div>
          <span class="error"> <?php echo $machErr;?></span>
            <div class="input_field checkbox_option">
            <input type="checkbox" id="cb1" name="checkbox" onchange="shfaqKushtet(this)">
    			<label for="cb1">Shiko dhe prano kushtet dhe kerkesat</label></div>
          <div style="overflow:hidden;height:150px;display:none" id="divkushtet">
            <?php $readfile=fopen("../resources/library/kushtet.txt", "r") or die("Unable to open file!");
                     
                     while(!feof($readfile)) {
                      echo fgets($readfile) . "\n";
                    }
                    fclose($readfile);

          
          ?>
                  </div>
            
           
          <input class="button" type="submit" value="Paguaj" />
          <span class="error"> <?php echo $msgError;?></span>

        </form>
      </div>
    </div>
  </div>
</div>




<?php 

       include(templates_footer); ?>
