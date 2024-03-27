<?php
    // Get the database connection instance
    $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
    require_once $basePath . "config/php/connect.php";

    // Start the session if not started already
    session_start();

    // Include PHPMailer classes
    require_once $basePath . "classes/mailer/PHPMailer.php";
    require_once $basePath . "classes/mailer/SMTP.php";
    require_once $basePath . "classes/mailer/Exception.php";

    // Calling classes from namespaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Set the sender informations
    $user_mail = $_SESSION['mail'];
    $user_name = $_SESSION['fullname'];

    // Retrieve the 2Fa from database
    $factor_pass_query = "SELECT 2fa_password FROM user WHERE email_user = :email";
    $bind = ':email';
    $stmt = $pdo->prepare($factor_pass_query);
    $stmt->bindParam($bind, $user_mail);
    $stmt->execute();

    // Get the user 2fa password to send the mail
    $user_2fa_password = $stmt->fetchColumn();

    // Set destination email address
    $destination = $_POST['destination'];
    $subject = $_POST['subject'];
    $message = $_POST['mail_message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $user_mail;
        $mail->Password   = $user_2fa_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender & Receiver
        $mail->setFrom($user_mail, $user_name); // Sender's email and name
        $mail->addAddress($destination, 'user'); // Receiver's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        if ($mail->send()) {
            header("Location: ../../app/views/mail.php?send=true&destination=" . urlencode($destination));

            // Define current date and time
            $current_date = date('Y-m-d');
            $current_time = date('H:i');

            // Insert message query
            $insert_message = "
                INSERT INTO message (email_destination, objet, contenu, send_date, send_time, email_user)
                VALUES (:destination, :objet, :contenu, :date, :time, :user)
            ";

            // Execute the insert query
            $insert_mess = $pdo->prepare($insert_message);
            $insert_mess->bindParam(':destination', $destination);
            $insert_mess->bindParam(':objet', $subject);
            $insert_mess->bindParam(':contenu', $message);
            $insert_mess->bindParam(':date', $current_date);
            $insert_mess->bindParam(':time', $current_time);
            $insert_mess->bindParam(':user', $user_mail);
            $insert_mess->execute();
        } else {
            header("Location: ../../app/views/mail.php?send=false&error=" . $mail->ErrorInfo);
        }
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
?>