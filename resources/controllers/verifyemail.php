<?php 

require_once("../config.php");

include(databaza);

$db=new database();
$query="SELECT email from user";
$arrayEmailave=$db->getData($query);   
if(isset($_REQUEST['q']))
  {  $q = $_REQUEST['q'];
    $q=strtolower($q);

          
         foreach($arrayEmailave as $key=> $value)
         {
             if($value['email']==$q)
                 echo 'Email ekziston'; 
         }
  }



?>