 <?php

$servername='localhost';
$username='root';
$password='';
$dbname = "testing";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

if(isset($_POST['save']))
{	 
    
    
    $nameofid = $_POST['nameofid']; 
    $f_name = $_POST['f_name'];
    $email_add = $_POST['email_add'];
    $p_no = $_POST['p_no'];
    $coun = $_POST['coun'];
    $pick_add = $_POST['pick_add'];
    $pick_add_line = $_POST['pick_add_line'];
    $pick_city = $_POST['pick_city'];
    $pick_zip = $_POST['pick_zip'];
    $drop_add_line = $_POST['drop_add_line'];
    $drop_city = $_POST['drop_city'];
    $drop_zip = $_POST['drop_zip'];
    $rec_name = $_POST['rec_name'];
    $rec_email = $_POST['rec_email'];
    $rec_con_numb = $_POST['rec_con_numb'];
	 $sql = "INSERT INTO map_data (miles,f_name,email_add,p_no,coun,pick_add,pick_add_line,pick_city,pick_zip,drop_add_line,drop_city,drop_zip,rec_name,rec_email,rec_con_numb) VALUES ('$nameofid','$f_name','$email_add','$p_no','$coun','$pick_add','$pick_add_line','$pick_city','$pick_zip','$drop_add_line','$drop_city','$drop_zip','$rec_name','$rec_email','$rec_con_numb')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
  
// ================mail=================
 
    $html = "<table class='table table-bordered'><thead> <tr><th scope='col'>Miles</th><th scope='col'>Full Name</th><th scope='col'>Email Address</th><th scope='col'>Phone Number</th><th scope='col'>Country</th><th scope='col'>Enter Pickup / Return Address</th><th scope='col'>Address Line</th><th scope='col'>City</th><th scope='col'>ZIP</th><th scope='col'>Address Line</th><th scope='col'>City</th><th scope='col'>ZIP</th><th scope='col'>Receiver Name</th><th scope='col'>Receiver Email</th><th scope='col'>Receiver Contact Number</th></tr></thead><tbody><tr><th scope='row'>$nameofid</th><th scope='row'>$f_name</th><th scope='row'>$email_add</th><th scope='row'>$p_no</th><th scope='row'>$coun</th><th scope='row'>$pick_add</th><th scope='row'>$pick_add_line</th><th scope='row'>$pick_city</th><th scope='row'>$pick_zip</th><th scope='row'>$drop_add_line</th><th scope='row'>$drop_city</th><th scope='row'>$drop_zip</th><th scope='row'>$rec_name</th><th scope='row'>$rec_email</th><th scope='row'>$rec_con_numb</th></tr></tbody></table>";
    require('smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "asifaslamaimviz@gmail.com";
    $mail->Password = 'jdmwncwtnwsaaljv';
    $mail->SetFrom("asifaslamaimviz@gmail.com");
    //   $mail->Subject = $subject;
    $mail->addAddress('woodjacob033@gmail.com');
    $mail->isHTML(true);
    $mail->subject = "NEW contact us";
    $mail->Body = $html;
    //   $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        echo 'Sent';
    }
}  


