<?php
	session_start();
	//include the File Upload library for uploading the images
	include('../library/class.upload_file.php');
	$UploadFile = new FileUpload();
	
	//include the Mail library for the method to send the mail
	include('../library/class.mail.php');
	$mail = new Mail();
	
	//checking for server request method
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(!empty($GLOBALS['_POST']['f_name']) && !empty($GLOBALS['_POST']['l_name']) && !empty($GLOBALS['_POST']['public_name']) && !empty($GLOBALS['_POST']['day']) && !empty($GLOBALS['_POST']['month']) && !empty($GLOBALS['_POST']['year']) && !empty($GLOBALS['_POST']['birth_place']) && !empty($GLOBALS['_POST']['country']) && !empty($GLOBALS['_POST']['city']) && !empty($GLOBALS['_POST']['state']) && !empty($GLOBALS['_POST']['street_address']) && !empty($GLOBALS['_POST']['postal_code']) && !empty($GLOBALS['_POST']['email_id']) && !empty($GLOBALS['_POST']['username']) && !empty($GLOBALS['_POST']['mobile_number']) && !empty($GLOBALS['_FILES']['modelImage']) && $GLOBALS['_POST']['year_limit'] == 'on' )
		{
			//upload the image
			$filename_desired = $GLOBALS['_POST']['f_name'].mktime();
			$uploadImage = $UploadFile->upload_file($filename_desired,'modelImage','../../images/model_image/');
			//image link 
			$image_link = 'http://handjobstop.com/images/model_image/'.$uploadImage;
			
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
							<p><span class="topic_heading">Stage name:</span><span class="topic_description">'.$GLOBALS['_POST']['public_name'].'</span></p>
							<p><span class="topic_heading">Date of Birth:</span><span class="topic_description">'.$GLOBALS['_POST']['day'].'/'.$GLOBALS['_POST']['month'].'/'.$GLOBALS['_POST']['year'].'</span></p>
							<p><span class="topic_heading">Birth Place:</span><span class="topic_description">'.$GLOBALS['_POST']['birth_place'].'</span></p>
							<p><span class="topic_heading">Country:</span><span class="topic_description">'.$GLOBALS['_POST']['country'].'</span></p>
							<p><span class="topic_heading">State/Region:</span><span class="topic_description">'.$GLOBALS['_POST']['state'].'</span></p>
							<p><span class="topic_heading">City:</span><span class="topic_description">'.$GLOBALS['_POST']['city'].'</span></p>
							<p><span class="topic_heading">Street Address:</span><span class="topic_description">'.$GLOBALS['_POST']['street_address'].'</span></p>
							<p><span class="topic_heading">Postal Code:</span><span class="topic_description">'.$GLOBALS['_POST']['postal_code'].'</span></p>
							<p><span class="topic_heading">Email Id:</span><span class="topic_description">'.$GLOBALS['_POST']['email_id'].'</span></p>
							<p><span class="topic_heading">Username:</span><span class="topic_description">'.$GLOBALS['_POST']['username'].'</span></p>
							<p><span class="topic_heading">Phone Country Prefix:</span><span class="topic_description">'.$GLOBALS['_POST']['phone_country_prefix'].'</span></p>
							<p><span class="topic_heading">Phone Number:</span><span class="topic_description">'.$GLOBALS['_POST']['phone_number'].'</span></p>
							<p><span class="topic_heading">Mobile Number:</span><span class="topic_description">'.$GLOBALS['_POST']['mobile_number'].'</span></p>
							<p><span class="topic_heading">ICQ:</span><span class="topic_description">'.$GLOBALS['_POST']['icq'].'</span></p>
							<p><span class="topic_heading">Website URL/Webpages:</span><span class="topic_description">'.$GLOBALS['_POST']['web_url'].'</span></p>
							<p><span class="topic_heading">Facebook Links:</span><span class="topic_description">'.$GLOBALS['_POST']['fb_link'].'</span></p>
							<p><span class="topic_heading">Twitter Name:</span><span class="topic_description">'.$GLOBALS['_POST']['twitter'].'</span></p>
							<p><span class="topic_heading">Model Image:</span><span class="topic_description"><img src="'.$image_link.'" alt="modelImage"></span></p>
							<p><span class="topic_heading">Note:</span><span class="topic_description">'.$GLOBALS['_POST']['short_note'].'</span></p>';
							
			
			
			//creating the message with stylesheet
			$message = $cssProperties.$message_text;
			
			//email address of receiver
			$to = 'filmme37@yahoo.com';
			
			$headers = "From: admin@handjobstop.com"."\r\n";
					
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			//sending the mail
			$mailSend = $mail->modelInfo($to,$message,$headers);
			
			header("Location: ../../modelContactForm.php");
			
		}
		else
		{
			header("Location: ../../modelContactForm.php?msg=please fill all the field!");
		}
		
	}

?>