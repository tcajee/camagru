<html>
   
   <head>
      <title>Verify you email please</title>
   </head>
   
   <body>
      
      <?php
         $to = "poriwen@mailcatch.com";
         $subject = "Verify your email";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:camagru.com \r\n";
        //  $header .= "Cc:sminnaar@student.wethinkcode.co.za \r\n";
        //  $header .= "MIME-Version: 1.0\r\n";
        //  $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>