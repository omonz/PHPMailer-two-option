<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    require './vendor/autoload.php';

    if(isset($_POST['php_mailer_obj'])){
        //etract the varaible and turn to array for phpmailer option
        extract($_POST);   
        
        /**
         * send the email using phpmailer
         * if you are not using gmail check the webmail mailer port and host the change the settings below to your own oga
         */
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail = new PHPMailer(true);                    // Enable verbose debug output
                //the line 19 above was added to initiate the PHPHMailer class
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;              
            $mail->Username   = 'your email or username';                     // SMTP username
            $mail->Password   = 'your password';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to
      
            $mail->setFrom('your email or username', 'Capital One');
            $mail->addAddress($email);     // Add a recipient
            $mail->addReplyTo('no-reply@your site address');
            $mail->isHTML(true);// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS`
        
            $mail->Subject = "Registration Successful";
            $mail->Body    = "Account creatiom successful with the name $name and email $email";
        
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }elseif (isset($_POST['mailer_obj'])) {
        //etract the varaible and turn to array for localhost option
        extract($_POST);
            /**
             * this section here is for localhost mailer if you prefer this one over the one above
             * the two mailer option are ok it depends on your preference 
             */
            $email_to = $email;
            $subject = "Mail Testing";
            $headers = "From: Mail Testing>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "
            <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 700px; min-width: 200px; background-color: #fff; padding: 20px; margin: auto; border-radius: 10px; box-shadow: 0px 10px 10px 5px;'>
                    <h1 style='font-size: 22px;'><center>Localhost Mailer Option</center></h1>
                    <h1>Name: $name</h1>
                    <p>Subject: $subject</p>
                    <p>Email: $email</p>
                    <p>
                        $body
                    </p>
                    <div id='footer' style='margin-top: 20px; text-align: center;'>
                        Best Regards, <hr>
                       Mail Testing
                    </div>
                </div>
            </body>
            ";

            if(mail($email_to, $subject, $message, $headers))
                // echo "<script type='text/javascript'>alert('login to your account.');</script>";
                echo "
                $message
                ";
            else
                echo 'not sent';
      
    }else{
       echo 'Nothing was pressed'; 
    }
?>