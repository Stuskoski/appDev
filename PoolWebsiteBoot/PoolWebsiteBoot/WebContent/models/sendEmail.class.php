<?php
//This function is used to send email/text once an order has been placed
class sendEmail{
	public static function EmailStore($to, $subject, $body){
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: Online Order <Stuskoski@gmail.com>";
	$headers[] = "Cc: Stuskoski <stuskoski@yahoo.com>";
	//$headers[] = "Reply-To: Recipient Name <3614599491.txt.att.net>";
	$headers[] = "X-Mailer: PHP/".phpversion();
	
	$mail = mail($to, $subject, $body, implode("\r\n", $headers));		//add order/number id to email
	}
	
	public static function EmailCustomer($to, $subject, $body){
		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=iso-8859-1";
		$headers[] = "From: no-reply-Uncle Johns Store<Stuskoski@gmail.com>";
		//$headers[] = "Reply-To: Uncle Johns Store <Stuskoski@gmail.com>";
		$headers[] = "X-Mailer: PHP/".phpversion();
	
		$mail = mail($to, $subject, $body, implode("\r\n", $headers));
	} //add order number to email
}

/**
 * Below are the changes you must do:
 * 
 * smtp_server=smtp.gmail.com
 * smtp_port=587
 * error_logfile=error.log
 * debug_logfile=debug.log
 * auth_username=your-gmail-id@gmail.com
 * auth_password=your-gmail-password
 * force_sender=your-gmail-id@gmail.com
 * 
 * SMTP=smtp.gmail.com
 * smtp_port=587
 * sendmail_from = your-gmail-id@gmail.com
 * sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
 * ;sendmail_path = "C:\xampp\mailtodisk\mailtodisk.exe"
 */




/**
 * Below are common email address for phone texts:
 * 
 * ATT: mobile-number@txt.att.net (SMS)
 * 		mobile-number@mms.att.net (MMS)
 * Sprint:
 * 		mobile-number@messaging.sprintpcs.com (SMS)
 * 		mobile-number@pm.sprint.com (MMS)
 * T-Mobile
 * 		mobile-number@tmomail.net (MMS)
 * Verizon:
 * 		mobile-number@vtext.com (SMS)
 * 		mobile-number@vzwpix.com (MMS)
 */