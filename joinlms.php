<?php
$servername = "localhost";
$username = "mmlms_com_dbu";
$password = "Chr^8JisLSe";
$db = "mmlms_com_db";
// Create connection
$conn = new mysqli($servername,$username, $password,$db);

if((isset($_POST['name']))&&(isset($_POST['email']))&&(isset($_POST['phone']))&&(isset($_POST['emvalue']))&&(isset($_POST['message']))){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$emvalue = $_POST['emvalue'];
$message=$_POST['message'];
$ipaddress = $_SERVER['REMOTE_ADDR'];
$created_date = date('Y-m-d H:i:s');
 
//insert it to database and and echo 1 for success 
$query = "INSERT INTO education_solutions_tbl (business_name,email,phone,estimated_monthly_volume,use_case,ipaddress,created_date) VALUES('$name','$email','$phone','$emvalue','$message','$ipaddress','$created_date')";
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
$mail->Subject = "Makemylms request from website";
$mail->Body = '
       <html>
           <head>
               <title>Education Solutions</title>
           </head>
           <body>
                <p><b>Business Name:</b> '.$_POST['name'].'</p>
                <p><b>Email:</b> '.$_POST['email'].'</p>
                <p><b>Phone:</b> '.$_POST['phone'].'</p>         
                <p><b>Estimated Monthly Volume:</b> '.$_POST['emvalue'].'</p>         
                <p><b>Message:</b> '.$_POST['message'].'</p> 
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
