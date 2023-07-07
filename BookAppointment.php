<div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                        <h1 class="display-4">Schedule A Free Consultation</h1>
                    </div>
                    <p class="text-white mb-5">How Did the Dot-Com Bubble Form?
In the early 90s, the advent of web browsers made the internet much more accessible for the average consumer. Once rare, computers began to appear in more and more households in the U.S., eventually becoming somewhat of a necessity. As the popularity of computers and the internet grew, many new web companies emerged to carve out their slice of the rapidly expanding information technology and online commerce industries.</p>
                    <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="https://my.indeed.com/p/jhona-cb475lz">Resume</a>
                    <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="https://www.linkedin.com/in/jhongil/">Linkedin</a>
                </div>
                
                        	
            <script type="text/javascript">
		
		 $("form").submit(function(e) {
                let error = "";

                if($("#email").val() == "") {
                    error += "The email field is required<br>.";
                }

                if($("#email").val() == "") {
                    error += "The subject field is required.<br>";
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
                        <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        <form method="post">
                            <div class="row g-3">
                            
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="name" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" name="email" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text" name="date"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text" name="time"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit"> Make An Appointment</button>
                                </div>
                                  <?php
    
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $subject = strip_tags(trim($_POST["email"]));
        $number = strip_tags(trim($_POST["date"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $customeremail = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $email = "Jhongil@arzugil.com";
        $message = trim($_POST["time"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($customeremail, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! Message Not Send.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "jhongil@arzugil.com";

        // Set the email subject.
        $subject = "New Message from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $customeremail\n\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Date: $number\n";
        $email_content .= "Time:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$customeremail>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thanks! Message has been sent successfully.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong. Please try again.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Oops! Something went wrong.";
    }
?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
 