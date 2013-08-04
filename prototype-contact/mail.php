<?php
$to ="admin@atyourcommand.com.au";
$email_text = '
<html>
<head>
  <title>New Contact Detail</title>
</head>
<body>
  <p>Here are the contact detail!</p>
  <table>
    <tr>
      <th>Name</th><td>'.$_POST['name'].'</td>
    </tr>
    <tr>
      <td>Skype Name</td><td>' . $_POST['skype'] . '</td>
    </tr>
    <tr>
      <td>Email</td><td>' . $_POST['email'] . '</td>
    </tr>';
		
		if(count($_POST['optionsCheckboxes'])>0){		
		foreach($_POST['optionsCheckboxes'] as $record){
			$email_text .= '<tr>
      <td>Contact me options</td><td>' . $record . '</td>
    </tr>';
		}
	}

 $email_text.= '</table>
</body>
</html>
';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$subject="New Contact Information Placed";
// Mail it
mail($to, $subject, $email_text, $headers);
?>