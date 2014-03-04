<?php
	session_start();
	//include the Mail library for the method to send the mail
	include('../library/class.mail.php');
	$mail = new Mail();
	
	//checking for server request method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//create the style properties of mail information
		$cssProperties = '<style>
							.info_heading{
								color: #ff0000;
								font-size: 22px;
							}
							.topic_heading{
								color: #000000;
								font-size: 18px;
								margin-right: 10px;
							}
							.topic_description{
								color: #4d4d4d;
								font-size: 18px;
								margin-left: 10px;
							}
						
					</style>';
		//create the message in the mail section
		$message_text = '<h3 class="info_heading">Model Information</h3>
						<p><span class="topic_heading">First Name:</span><span class="topic_description">'.$GLOBALS['_POST']['f_name'].'</span></p>
						<p><span class="topic_heading">Last Name:</span><span class="topic_description">'.$GLOBALS['_POST']['l_name'].'</span></p>
						<p><span class="topic_heading">Date of Birth:</span><span class="topic_description">'.$GLOBALS['_POST']['day'].'/'.$GLOBALS['_POST']['month'].'/'.$GLOBALS['_POST']['year'].'</span></p>
						<p><span class="topic_heading">Birth Place:</span><span class="topic_description">'.$GLOBALS['_POST']['birth_place'].'</span></p>
						<p><span class="topic_heading">Country:</span><span class="topic_description">'.$GLOBALS['_POST']['country'].'</span></p>
						<p><span class="topic_heading">State/Region:</span><span class="topic_description">'.$GLOBALS['_POST']['state'].'</span></p>
						<p><span class="topic_heading">City:</span><span class="topic_description">'.$GLOBALS['_POST']['city'].'</span></p>
						<p><span class="topic_heading">Street Address:</span><span class="topic_description">'.$GLOBALS['_POST']['street_address'].'</span></p>
						<p><span class="topic_heading">Postal Code:</span><span class="topic_description">'.$GLOBALS['_POST']['postal_code'].'</span></p>
						<p><span class="topic_heading">Email Id:</span><span class="topic_description">'.$GLOBALS['_POST']['email_id'].'</span></p>
						<p><span class="topic_heading">Username:</span><span class="topic_description">'.$GLOBALS['_POST']['username'].'</span></p>
						<p><span class="topic_heading">Display name:</span><span class="topic_description">'.$GLOBALS['_POST']['public_name'].'</span></p>
						<p><span class="topic_heading">Password:</span><span class="topic_description">'.$GLOBALS['_POST']['password'].'</span></p>
						<p><span class="topic_heading">Phone Country Prefix:</span><span class="topic_description">'.$GLOBALS['_POST']['phone_country_prefix'].'</span></p>
						<p><span class="topic_heading">Phone Number:</span><span class="topic_description">'.$GLOBALS['_POST']['phone_number'].'</span></p>
						<p><span class="topic_heading">Mobile Number:</span><span class="topic_description">'.$GLOBALS['_POST']['mobile_number'].'</span></p>
						<p><span class="topic_heading">MSN:</span><span class="topic_description">'.$GLOBALS['_POST']['msn'].'</span></p>
						<p><span class="topic_heading">Yahoo:</span><span class="topic_description">'.$GLOBALS['_POST']['yahoo'].'</span></p>
						<p><span class="topic_heading">ICQ:</span><span class="topic_description">'.$GLOBALS['_POST']['icq'].'</span></p>
						<p><span class="topic_heading">Website URL/Webpages:</span><span class="topic_description">'.$GLOBALS['_POST']['web_url'].'</span></p>
						<p><span class="topic_heading">Twitter Name:</span><span class="topic_description">'.$GLOBALS['_POST']['twitter'].'</span></p>';
		
		
		//creating the message with stylesheet
		$message = $cssProperties.$message_text;
		
		//email address of receiver
		$to = 'dipanjan.electrical@gmail.com';
		
		//sending the mail
		$mailSend = $mail->modelInfo($to,$message);
		echo $mailSend;
	}

?>