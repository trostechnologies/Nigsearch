<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);


  if (!empty($email) && !empty($phone)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $to = " hello@nigsearch.com";
        $from = "$email";
        $fromName = "$name";

        $subject = "You got a Message from Nigsearch Contact form  ";

        $htmlContent = ' 
        <html>
        <body>
          <div class="contaniner">
            <div class="row">
              <div class="col-8">
                <div style="margin:0;font-family:`HelveticaNeue`,Helvetica,Arial,sans-serif;box-sizing:border-box;font-size:13px;color:#616161;width:100%;height:100%;line-height:1.6em;background-color:#74a8cf">
                <div style="vertical-align:top;padding:0!important;width:100%!important">
                 <div style="max-width:500px;display:block;padding:20px;background:white">
                    <div class="col-8">
                      <h6 style="text-align:center">' . ucfirst($website) . '</h6>
                      <div><p>' . $message . '</p></div>
                    </div>   
                    <div >                
                    <h6><b>Customer details:</b></h6> 
                    <strong>Name: </strong><em>' . $name . '</em> <br>
                    <strong>Email: </strong><em>' . $email . '</em> <br>
                    <strong>Phone: </strong><em>' . $phone . '</em>  <br>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </body>
        </html>
           ';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";
        $headers .= 'Reply-To:' . $fromName . ' hello@nigsearch.com' . "\r\n";
        $headers .= 'Bcc: hello@nigsearch.com' . "\r\n";

        // Send email
        if (mail($to, $subject, $htmlContent, $headers)) {         
          echo " Thank you for contacting us, We will get back to you";
        } else {
            echo "Sorry, failed to send your message!";
        }
    } else {
        echo "Enter a valid email address!";
    }
} else {
    echo "Email and Phone Number field is required!";
}
?>
