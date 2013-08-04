<?php
$to ="admin@atyourcommand.com.au";
$email_text = '
<html>
<head>
  <title>New Contact Detail</title>
</head>
<body>
  <p><h1>Here are the contact detail!</h1></p>
  <table>
    <tr>
      <td><strong>User Name:</strong></td><td>'.$_POST['name'].'</td>
    </tr>
    <tr>
      <td><strong>Skype Name:</strong></td><td>' . $_POST['skype'] . '</td>
    </tr>
    <tr>
      <td><strong>Email:</strong></td><td>' . $_POST['email'] . '</td>
    </tr>';
		
		if(count($_POST['optionsCheckboxes'])>0){		
		foreach($_POST['optionsCheckboxes'] as $record){
			$email_text .= '<tr>
      <td><strong>Contact options:</strong></td><td>' . $record . '</td>
    </tr>';
		}
	}

 $email_text.= '</table>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$subject="New Contact Information Placed";
$to ="admin@atyourcommand.com.au";
$from = "do-not-reply@personaltrainerwall.com";
$headers .= "From:" . $from;
mail($to,$subject,$email_text,$headers);
//echo "Mail Sent.";

require_once(dirname(__FILE__).'/swift/lib/swift_required.php');
function sendEmail($reportTitle,$emailBody,$sendEmailTo,$fromEmail,$files){
		$mailer = Swift_Mailer::newInstance(Swift_MailTransport::newInstance());
		$message = Swift_Message::newInstance($reportTitle)
									->setFrom($fromEmail)
								 ->setTo($sendEmailTo)
								 ->setBody($emailBody, 'text/html');
		foreach($files as $file)
		{
			$message->attach(Swift_Attachment::fromPath($file));
		}
		$mailer->send($message);
		unset($message);
		unset($mailer);	
}
$email_message ="<p><h1>Hi ".$_POST['name']." !</h1></p>";
$email_message .="<p>Please check attach pdf file.</p>";
$email_subject .="Thank you for sending information";
$email_address = $_POST['email'];
$fromEmail = array($from => $from);
$file_name = dirname(__FILE__).'/ayc-infographic.pdf';
$files[] = $file_name;
sendEmail($email_subject,$email_message,$email_address,$fromEmail,$files);
?>