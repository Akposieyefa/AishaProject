<?php
    include_once('classes/Orphanage.php');
    include_once('classes/Mail.php');
    $mail = new Mail();
    $home = new Orphanage();
    $homes = $home->index();

if (isset($_POST['send'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (empty($subject) || empty($message)) {
        echo "
              <script>
                     alert('No field must be empty');
              </script>
	";
    } else {
        foreach ($homes as $home) {
            $email = $homet['email'];
            $send = $mail->send_mail($email, $subject, $message);
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
    }
}
