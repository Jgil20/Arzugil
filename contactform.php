 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="name" id="name" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" name="email" id="email" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-light border-0" name="subject" id="subject" placeholder="Subject" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="5" name="message" id="message"placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    <script>    
                        
		 $("form").submit(function(e) {
                let error = "";

                if($("#name").val() == "" ) {
                    error += "The name field is required<br>.";
                }

                if($("#email").val() == "") {
                    error += "The email field is required.<br>";
                }
                  if($("#subject").val() == "") {
                    error += "The content field is required.<br>";
                }
                if($("#message").val() == "") {
                    error += "The message field is required.<br>";
                }
                //test if there was an error or not

                if(error != "") {
                    $("#error").html('<div class="alert alert-danger"' +
                    'role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                    return false;
                }
                else {  //no errors!
                    return true;
                }//end if-else

            });
		</script>
        
        <?php
    
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
		
		$error = ""; $successMessage = "";
		
		if(!$_POST["name"]) {
			
			$error .= "An email address is required.<br>";
			
		}
		
			if(!$_POST["email"]) {
			
			$error .= " The content field is required.<br>";
			
			
			
		}
			if ($error != "") {
				
				$error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
			
			}

        
        // Get the form fields and remove whitespace.
        $name = strip_tags(test_input($_POST["name"]));
        $lastname = strip_tags(test_input($_POST["subject"]));
        $yournumber = strip_tags(test_input($_POST["number"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(test_input($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = test_input($_POST["message"]);
        

        function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        
             // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "jhongil@arzugil.com";

        // Set the email subject.
        $subject = "New Message from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Number: $number\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
         $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, ' . 
                                'we\'ll get back to you ASAP!</div>';
            
            
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - try again later</div>';
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - try again later</div>';
    }
?>