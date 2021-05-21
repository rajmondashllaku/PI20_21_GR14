<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");

echo bootstrap_includes;  

include_once(databaza);
function generateRandomString($length = 10) {
  if($length<=0){
    throw new Exception("Keni kerkuar te krijohet string me me pak se 1 karakter");
}
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

$db=new database();
echo $db->connect();

$msgError=$email=$machErr=$passerror=$emailerror="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_POST['emri']==""||
    $_POST['mbiemri']==""||
     ($_POST['email']=="" && $_POST['email'] != filter_var($email,FILTER_VALIDATE_EMAIL)) ||
     $_POST['password']==""||
     $_POST['passwordk']=="" ||
     empty($_POST['checkbox']))
     {
        $msgError=("Plotesoni te gjitha fushat dhe vendos tik-un");
     }
   else if($_POST['password'] != $_POST['passwordk']){
    $machErr=("Password -at nuk perputhen");
  }
    else
  {
      $emri=preg_replace("/[\"\';-]/","",$_POST['emri']);
      $mbiemri=preg_replace("/[\"\';-]/","",$_POST['mbiemri']);
      $email=preg_replace("/[\"\';-]/","",$_POST['email']);
      $password=preg_replace("/[\"\';-]/","",$_POST['password']);
      $salt=generateRandomString();
      $password=sha1($salt.$password); 
      $uppercase = preg_match('@[A-Z]@',$password);
      $lowercase = preg_match('@[a-z]@',$password);
      $number = preg_match('@[0-9]@',$password);
      $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
      $emailregex=preg_match($regex,$email);
      if(!$uppercase || !$lowercase || !$number || strlen($password)<8){
        $passerror=("Paswordi duhet te permbaj 8 shkronja, shkronja te medhaja dhe numra!");
      }else if(!emailregex){
        $emailerror=("Email nuk eshte valide");
      }
      $query="INSERT INTO user(emri,mbiemri,email,salt,isManager,password) VALUES('$emri','$mbiemri','$email','$salt',0,'$password')";  
      echo $query;  
      echo $db->executeData($query);
    header("Location:llogin.php");
  }
}

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
   function isEmailValid(email)
{
    var xmlhttp=new XMLHttpRequest();
    if (email.length == 0) { 
        //shkruj ni alert qi emaili zbrazet
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("paragrafi").style.display="block";
            document.getElementById("paragrafi").innerHTML = this.responseText;
            document.getElementById("email").style.border="1px solid red";
            
          }
          
        };
        xmlhttp.open("GET", "../resources/controllers/verifyemail.php?q=" + email, true);
        xmlhttp.send();
        header("Location:index.php");
      }
}
function border()
{
  document.getElemntById("email").style.border='1px solid #cccccc';
}
    
  </script>

<?php
  $css="../css/registration.php";
  $header_css="../css/style2.css";

include_once(templates_header);
?>


<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Formulari i Regjistrimit</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="emri" placeholder="Emri" />
                
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="mbiemri" placeholder="Mbiemri"  />
              </div>
            </div>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            
            <input type="email" style="border:  1px solid #cccccc"id="email" name="email" placeholder="Email" onblur="isEmailValid(this.value)"/>
            <p id="paragrafi" style="display:none;font-size:10px;text-align:center;color:red"></p>
          
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password"  />
          </div>
          <span class="error"> <?php echo  $passerror;?></span>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="passwordk" placeholder="Konfirmo Password-in"  />
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
          
           
          <input class="button" type="submit" value="Register" />
          <span class="error"> <?php echo $msgError;?></span>

        </form>
      </div>
    </div>
  </div>
</div>




<?php 

       include(templates_footer); ?>
