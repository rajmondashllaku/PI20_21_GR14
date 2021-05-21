<?php 
  require_once("../resources/config.php");
if($_SERVER['REQUEST_METHOD']=="POST"){

  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  include(databaza);
  $db=new database();


  $passwordiri=$_POST['conpass'];
  $passwordiriKonfirmo=$_POST['conpass1'];
  $email=$_POST['email'];

  $query="SELECT salt from user where email='$email'";
  $salt=$db->getData($query);
  if($passwordiri==$passwordiriKonfirmo)
  {
      $pass1=sha1($salt[0]['salt'].$passwordiri);
      $sql="UPDATE user set password='$pass1' where email='$email';";
      $result=$db->executeData($sql);
     if($result) 
      header("Location:llogin.php");
  }

}
$header_css="../css/style2.css";
$css_includes="../css/update.css";
require(templates_header);
?>

  <div class="formUpdate">
    <h3>Ndrysho Passwordin</h3>
  <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <input type="email" name="email" placeholder="Sheno email">
  <input type="password" name="conpass" placeholder="Nderro passin">
  <input type="password" name="conpass1" placeholder="Konfirmo passin">
  <input type="submit" value="submit">
  </form>
  </div>
</body>
</html>