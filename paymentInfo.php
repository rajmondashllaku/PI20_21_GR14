<?php



if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_POST['name_on_card']==""||
    $_POST['card_number']==""||
    
     $_POST['data_skadimit']==""||
     $_POST['CVV']=="" ||
     empty($_POST['checkbox']))
     {
        $msgError=("Plotesoni te gjitha fushat dhe vendos tik-un");
     }
  
     $ticketInfo=$_POST['info'];
     $ticketInfo.="Emri i karteles se perdoruesit:".$_POST['name_on_card']."\n";
     $ticketInfo.="Numri i  karteles se perdoruesit :".$_POST['card_number']."\n";
     $ticketInfo.="Data e skadimit te karteles :".$_POST['data_skadimit']."\n";
     $ticketInfo.="CVV:".$_POST['CVV']."\n";
     $ticketFile=fopen("userTicket.txt",'w');
     fwrite($ticketFile,$ticketInfo); 
   header("Location:searchFlight.php");
      
}

?>