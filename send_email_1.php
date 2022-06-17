<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Magnifica Questionnaire Form Wizard includes Coronavirus Health questionnaire">
    <meta name="author" content="Ansonika">
    <title>Magnifica | Questionnaire Form Wizard by Ansonika</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "index.html"
    }
    </script>

</head>
<body style="background-color:#fff;" onLoad="setTimeout('delayedRedirect()', 5000)">
<?php
	$mail = $_POST['email'];

	$to = "info@domain.com";/* YOUR EMAIL HERE */
	$subject = "Magnifica CORONAVIRUS Health Questionnaire";
	$headers = "From: Magnifica Questionnaire <noreply@yourdomain.com>";

	$message  = "QUESTIONNAIRE\n";
	$message .= "\nHave you traveled to any one of the destinations below in the last 21 days?\n" ;
				foreach($_POST['question_1'] as $value) 
					{ 
						$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
					};
	$message .= "\nHave you recently been in contact with a person with Coronavirus? " . $_POST['question_2'];
	$message .= "\nAre you experiencing any difficulty in breathing? " . $_POST['question_3'];
	if (isset($_POST['question_4']) && $_POST['question_4'] != "")
		{
		$message .= "\nPlease tick any one of the following symptoms that can be applies to you:\n";
		foreach($_POST['question_4'] as $value)
			{
				$message.= "- " . trim(stripslashes($value)) . "\n";
			};
		}
	
	$message .= "\nDo you have fever higher than 100.3° F? " . $_POST['question_5'];
	$message .= "\nDo you have a runny nose? " . $_POST['question_6'];
	$message .= "\nAre you experiencing muscle aches, weakness, or lightheadedness? " . $_POST['question_7'];
	$message .= "\nAre you having diarrhea, stomach pain, vomiting? " . $_POST['question_8'];

	$message .= "\n\nUSER DETAILS\n";
	$message .= "\nFirst and Last Name: " . $_POST['name'];
	$message .= "\nEmail: " . $_POST['email'];
	$message .= "\nTelephone: " . $_POST['phone'];
	$message .= "\nGender: " . $_POST['gender'];

		//Receive Variable
		$sentOk = mail($to,$subject,$message,$headers);
						
		//Confirmation page
		$user = "$mail";
		$usersubject = "Magnifica CORONAVIRUS Health Questionnaire";
		$userheaders = "From: Magnifica Questionnaire <noreply@yourdomain.com>";
		/*$usermessage = "Thank you for your time. Your quotation request is successfully submitted.\n"; WITHOUT SUMMARY*/
						
		//Confirmation page WITH  SUMMARY
		$usermessage = "Thank you for your time. Your Health status Questionnaire is successfully submitted. We will reply shortly.\n\nBELOW A SUMMARY\n\n$message"; 
		mail($user,$usersubject,$usermessage,$userheaders);
	
?>
<!-- END SEND MAIL SCRIPT -->   

<div id="success">
    <div class="icon icon--order-success svg">
         <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
          <g fill="none" stroke="#8EC343" stroke-width="2">
             <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
             <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
          </g>
         </svg>
     </div>
	<h4><span>Request successfully sent!</span></h4>
	<small>You will be redirect back in 5 seconds.</small>
</div>
</body>
</html>