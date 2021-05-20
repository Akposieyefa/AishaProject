<?php
    include_once('classes/DB.php');
    include_once('classes/Mail.php');
    $pdo = new DB();
    $mail = new Mail($pdo);

if (isset($_POST['email'])) {
    $send = $mail->send_mail($email,$subject,$name,$amount);
    if ($send) {
        echo "
             <script>
                    alert('Email sent');
             </script>
      ";
    } else {
        echo "
             <script>
                    alert('Error');
             </script>
      ";
    }
}
