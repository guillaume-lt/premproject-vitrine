<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["username"]);
    $phone = trim($_POST["phone"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if(isset($_POST['g-recaptcha-response'])){
        $captcha = $_POST['g-recaptcha-response'];
    }

    //Validate the data
    if (empty($name) OR empty($phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message) OR empty($captcha)) {
        http_response_code(400);
        echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> <strong>Veuillez remplir tout les champs et renseigner le captcha pour valider.</strong>";
        exit;
    }

    //recipient email address.
    $recipient = "guillaumelebelt@gmail.com";

    //email subject.
    $subject = "Nouveau message de $name";

    //email content.
    $email_content = "Nom: $name\n";
    $email_content .= "Téléphone: $phone\n\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    //email headers.
    $email_headers = "De : $name <$email>";

    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc8ox0TAAAAAFKmrOk1ZPQxSkPxHI8RSren1WK7&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $decoded_response = json_decode($response, true);

    if($decoded_response['success'] == true)	{
        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> <strong>Merci ! Votre message a été envoyé.";
        } else {
            http_response_code(500);
            echo "OUPS ! Votre message n'a pas pu être envoyé.";
        }
    } else {
        http_response_code(400);
        echo 'Attention, vous ne pouvez pas envoyer autant de messages.';
    }

}

?>
