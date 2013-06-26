#use in contorller as bellow example
	
	
	##############################################
	$this->load->library('smtp_validate_email');
	
	$email = 'manimani1014@gmail.com';
	// an optional sender
	$sender = 'manikandan@digitalchakra.in';

	$SMTP_Validator = new Smtp_validate_email();
	// turn on debugging if you want to view the SMTP transaction
	$SMTP_Validator->debug = false;
	// do the validation
	$results = $SMTP_Validator->validate(array($email), $sender);
	// view results
	echo $email.' is '.($results[$email] ? 'valid' : 'invalid')."\n";
	
	########################################################