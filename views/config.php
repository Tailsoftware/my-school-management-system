<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeption;

 require('vendor/autoload.php');

$server="localhost";
$user="root";
$password="";
$dbname="myschool";

try{
    $conn=mysqli_connect($server,$user,$password,$dbname);

}
catch(mysqli_sql_exception){
    
};


function sendmail($messag,$receaver,$firstname,$lastname,$school,$adminemail,$image){

  // $mail = new PHPMailer;
  // $mail->isSMTP();
  // $mail->SMTPAuth = true;
  // $mail->SMTPSecure ='ssl';
  // $mail->Host = 'smtp@gmail.com';
  // $mail->Port ='465';
  // $mail->isHTML();
  // $mail->Username='infoberkshiree@gmail.com';
  // $mail->Password ='maaueridutyeanvo';
  // $mail->SetFrom('infoberkshiree@gmail.com');
  // $mail->Subject='support';
  // $mail->Body ="$message";
  // $mail->AddAddress("$receaver");
  // $mail->Send();
  
  
  
  
  $year = date('Y');
  
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
                          //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'infoberkshiree@gmail.com';                     //SMTP username
      $mail->Password   = 'maaueridutyeanvo';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('infoberkshiree@gmail.com', 'support');
     //Add a recipient
      $mail->addAddress("$receaver");               //Name is optional
     
  
    
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $school;
      $mail->Body    = "<!DOCTYPE html>
      <html lang='en'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Notification</title>
          <style>
          .container{
              width:350px;
          
              margin: auto;
              text-align: center;
  
          }
          header{
              background-color:rgb(157, 157, 216);
              padding: .5cm;
              text-align: center;
  
              text-transform: capitalize;
          }
          section{
              background-color:rgb(212, 216, 203);
              padding: .5cm;
             text-align: center;
             
              text-transform: capitalize;
          }
          footer{
              background-color: gainsboro;
              padding: .5cm;
              text-align: center;
              text-transform: capitalize;
          }
          </style>
      </head>
      <body>
          <div class='container'>
              <header>
                  <h3>school admin</h3>
              </header>
              <section>
                  <h4>dear <span>$firstname</span> <span>$lastname</span></h4>
                  <p>$messag.</p>
              </section>
              <footer>
                  <p>we are happy to have you as one of us &copy; $year courtesy: $school  <br> for complaint and suggestion, kindly send an email to <a href='mailto:$adminemail'>admin@gmail.com</a></p>
              </footer>
      
          </div>
      </body>
      </html>";
   
      $mail->send();
      
  } catch (Exception $e) {
      echo '<script>alert("email not sent ")</script>';
  }
  
  
  
  
  }

function encryptingdata(){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    echo $encrypt =  openssl_encrypt($chatid,'AES-256-CBC',86129925,0,$iv);
     
  echo $decrypt =  openssl_decrypt($encrypt,'AES-256-CBC',86129925,0,$iv);

}



function pdf($a){
    require_once __DIR__ . '/mpdf/vendor/autoload.php';
    
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHtml($a);
    $mpdf->Output();
    
    
    }


