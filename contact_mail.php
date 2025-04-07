<?php
$servername = "localhost";
$username = "mmlms_com_dbu";
$password = "Chr^8JisLSe";
$db = "mmlms_com_db";
// Create connection
$conn = new mysqli($servername,$username, $password,$db);
if((isset($_POST['fname']))&&(isset($_POST['lname']))&&(isset($_POST['email']))&&(isset($_POST['industry']))&&(isset($_POST['phone']))){
$fname=$_POST['fname'];
$lname = $_POST['lname'];
$email=$_POST['email'];
$industry=$_POST['industry'];
$phone=$_POST['phone'];
$ipaddress = $_SERVER['REMOTE_ADDR'];
$created_by = date('Y-m-d H:i:s');
 
//insert it to database and and echo 1 for success 
$query = "INSERT INTO Contact_tbl (fname,lname,email,industry,ipaddress,phone,created_by) VALUES('$fname','$lname','$email','$industry','$ipaddress','$phone','$created_by')";
$res = mysqli_query($conn,$query);
include('mail/library.php'); 
include('mail/classes/class.phpmailer.php'); 
$mail = new PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "noreply@nplive.in";
$mail->Password = "NP@live123";
$mail->SetFrom("noreply@nplive.in");
$mail->Subject = "Makemylms from website";
$mail->Body = '
       <html>
           <head>
               <title>Contact US</title>
           </head>
           <body>
               <p><b>Name:</b> '.$_POST['fname'].' '.$_POST['lname'].'</p>
               <p><b>Email:</b> '.$_POST['email'].'</p>
                <p><b>Business Name:</b> '.$_POST['industry'].'</p>  
                <p><b>Phone:</b> '.$_POST['phone'].'</p>                   
           </body>
       </html>';
$mail->AddAddress('mail2dipesh@gmail.com'); // mail2dipesh@gmail.com
$mail->AddAddress('anks0985@gmail.com');
    $mail->Send();
    echo "Thank you! for showing your interest in Make My LMS, we will get in touch with you shortly";
 } else {
    
    echo "Mailer Error: " . $mail->ErrorInfo;
 }
?>
