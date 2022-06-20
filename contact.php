<?php
if(isset($_POST['email'])) {


    $email_to = "hetrajsinhraj@gmail.com";

    function died($error) {
        echo "We are sorry, but there's error found with the form you submitted.<br /><br/>";
        echo $error."<br/><br/>";
        echo "Please go back and try again after few minutes.<br/><br/>";
        die();
    }

    if(!isset($_POST['name']) ||
        !isset($_POST['surname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['mobile']) ||
        !isset($_POST['message'])) {
            died('We are sorry, but there appears to be a problem with form you submitted..');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email_from = $_POST['email'];
        $phone = $_POST['mobile'];
        $message = $_POST['message'];


    function clean_string($string) {
        $bad = array("content-type", "bcc:" , "to:" , "cc:" , "href");
        return str_replace($bad , "" , $string);
    }

    
    $email_message .= "Name: " . clean_string($name)."\n";
    $email_message .= "Surname: " .clean_string($surname)."\n";
    $email_message .= "Email: " .clean_string($email_from)."\n";
    $email_message .= "Contact No. " .clean_string($phone)."\n";
    $email_message .= "Message: " .clean_string($message)."\n";


    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_message , $headers);
}
?>







<!-- place own succes html below -->
<html>
    <head></head>
    <body>
        <script type="text/javascript">alert("we have recieved your request, we will get back to you shortly. Thank You");window.location.href='index.html';

        </script>
    </body>
</html>


<?php
die();
?>