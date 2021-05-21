<?php 




if(isset($_POST['send_email'])){
    
    $email = $_POST['email_to'];
    $regexp = "/[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}/";

    if (preg_match($regexp, $email)) {
        if(isset($_POST['name'])){
            $emri=explode(" ",$_POST['name']);
        }
        $email=preg_replace("/rinabajra2000/",'rinabajra2000',$email);
        sendEmail($email,"Email from $emri[0],". $_POST['subject'],$_POST['content']);

    } else {
        echo $email;
        echo "Email address is <u>not</u> valid.";
    }
    
}



function sendEmail($emailTo, $subject,$content){
        require_once 'PHPMailer/PHPMailerAutoload.php';

        //PHPMailer Object
        $mail = new PHPMailer;        
        //From email address and name
        $mail->isSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->From = "rinabajra2000@gmail.com";
        $mail->FromName = "Full Name";
        $mail->SMTPSecure = 'ssl';          
        $mail->Port = 465;
        //To address and name
        $mail->addAddress($emailTo); //Recipient name is optional
        
        //Send HTML or Plain Text email
        $mail->isHTML(true);

        $content = '<div style="max-width: 560px; padding: 20px; background: #ffffff; border-radius: 5px; margin: 40px auto; font-family: Open Sans,Helvetica,Arial; font-size: 15px; color: #666;">
        <div style="color: #444444; font-weight: normal;">
        <div style="text-align: center; font-weight: 600; font-size: 26px; padding: 10px 0; border-bottom: solid 3px #eeeeee;">Projekti</div>
        <div style="clear: both;"> </div>
        </div>
        <div style="padding: 0 30px 30px 30px; border-bottom: 3px solid #eeeeee;">
        <div style="padding: 30px 0; font-size: 24px; text-align: center; line-height: 40px;">'.$content .'</div>
        </div>
        <div style="color: #999; padding: 20px 30px;">
        <div>The <a style="color: #3ba1da; text-decoration: none;" href="#">Projekti</a> Team</div>
        </div>
        </div>';
        
        $mail->Subject = $subject;
        $mail->Body =$content;
        // $mail->AltBody = "This is the plain text version of the email content";
        
        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
}


?>