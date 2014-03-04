<?php
class Mail{
         
		/*
		*  The mail id of the system
		*/
		private $sysMail = '';
		
		
		/*
		*  Public variable which is used to define where the mail will go
		*/
		private $to= '';

		/*
		*  Message which will be send to the user
		*/
		
		private $subject = '';
		


		/*
		*  Public variable which is used to from where this person is getting the mail
		*/
		
		public $from = 'admin@vyrazu.com';
		
		
		
		function getDataForRegistration($to,$membershipId){
			$this->to = $to;
			$whethermailsent = $this->activationLink($this->to,$membershipId);
			return $whethermailsent;
		}
		
		function mailPassword($to,$password){
		    
			$msg = "Your Password is: ".$password;
			
			$subject = "!Important Mail From ABCD";
			
			$headers = "From: sales@handjobstop.com" . "\r\n";

			$retval  = mail($to,$subject,$msg,$headers);		
			
			//temp codes ends here
			
			if( $retval == 1 )  
			   {
			  return 'mailsent';
			   }
			 else
			  {
				  return "Message could not be sent";
			   }

		}
				
		
		/*
		*Function to send a mail to the admin for customer query using contact page
		*/
		
				function querymail($name,$phone,$email,$title,$subject,$message){
					$to = "sales@handjobstop.com";
					$sub = $subject;
					$msg = $title."\n".$message."\n Phone number:".$phone;
					$header = "From:".$email."\r\n";
					
					$retval = mail($to,$sub,$msg,$header);
					
					if( $retval == 1 )  
				   {
				  return 'mailsent';
				   }
				 else
				  {
					  return "Message could not be sent";
				   }
				}
				
			/*
				Function to send invoice to the customer with the details
			*/	
			function modelInfo($to,$message){
				
				$sub = 'Information of Model';
				$headers = "From: admin@handjobstop.com"."\r\n";
				
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				$retval = mail($to,$sub,$message,$headers);
				if($retval == 1 )
				{
				 	return 'mailsent';
				}
				else
				{
					return "Message could not be sent";
				}
			}
	
}


?>