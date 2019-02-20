<?php
    // My modifications to mailer script from:
    // http://blog.teamtreehouse.com/create-ajax-contact-form
    // Added input sanitizing to prevent injection

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        $tel = trim($_POST["tel"]);
        $website = trim($_POST["website"]);
        $learnabout = trim($_POST["learnabout"]);
        $budget = trim($_POST["budget"]);
       $completiondate = trim($_POST["completeBy"]);

       $businessname = trim($_POST["businessname"]);
       $yourposition = trim($_POST["yourposition"]);
       $businessdo = trim($_POST["businessdo"]);

       $newwebsite = trim($_POST["newwebsite"]);
       $numpages = trim($_POST["numpages"]);



        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "neil.t.nathan@gmail.com";

        // Set the email subject.
        $subject = "New contact from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";


        $email_content .= "Telephone Number:\n$tel\n\n";
        $email_content .= "Website:\n$website\n\n";
        $email_content .= "How did you hear about us?:\n$learnabout\n\n";

        $email_content .= "What is your business name?:\n$businessname\n\n";
        $email_content .= "What is your position in the business?:\n$yourposition\n\n";
        $email_content .= "What does your business do?:\n$businessdo\n\n";

        $email_content .= "New business or redesign?:\n$newwebsite\n\n";

        $email_content .= "Budget:\n$budget\n\n";
      $email_content .= "Completion date:\n$completiondate\n\n";
      $email_content .= "Number of pages:\n$numpages\n\n";
        $email_content .= "Message:\n$message\n\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
