 <?php
// database connection
$servername='localhost';
$username='root';
$password='';
$dbname = "testing";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
// data insert in database and send data gmail
if(!empty($_POST))
{	 
    $output = '';
    $message = '';
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
                // $output .= $message;
	 } else {
        $output .= 'Error' . $query;
	 } 
  
// ================mailer=================
 
    $html = "<table> <tr>    <th scope='col'>Miles</th>    <td scope='row'>$nameofid</td></tr><tr>    <th scope='col'>Full Name</th>    <td scope='row'>$f_name</td></tr><tr>    <th scope='col'>Email Address</th>    <td scope='row'>$email_add</td></tr><tr>    <th scope='col'>Phone Number</th>    <td scope='row'>$p_no</td></tr><tr>    <th scope='col'>Country</th>    <td scope='row'>$coun</td></tr><tr>    <th scope='col'>Enter Pickup/Return Add</th>    <td scope='row'>$pick_add</td></tr><tr>    <th scope='col'>Address Line</th>    <td scope='row'>$pick_add_line</td></tr><tr>    <th scope='col'>City</th>    <td scope='row'>$pick_city</td></tr><tr>    <th scope='col'>ZIP</th>    <td scope='row'>$pick_zip</td></tr><tr>    <th scope='col'>Address Line</th>    <td scope='row'>$drop_add_line</td></tr><tr>    <th scope='col'>City</th>    <td scope='row'>$drop_city</td></tr><tr>    <th scope='col'>ZIP</th>    <td scope='row'>$drop_zip</td></tr><tr>    <th scope='col'>Receiver Name</th>    <td scope='row'>$rec_name</td></tr><tr>    <th scope='col'>Receiver Email</th>    <td scope='row'>$rec_email</td></tr><tr>    <th scope='col'>Receiver Contact Number</th>    <td scope='row'>$rec_con_numb</td></tr></table>";
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
    $mail->Subject = 'Step Form Data';
    $mail->addAddress('asifaslamaimviz@gmail.com');
    // $mail->addAddress('woodjacob033@gmail.com');
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


