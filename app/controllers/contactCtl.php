<?php
    // Get the database connection instance
    $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
    require_once $basePath . "config/php/connect.php";

    // start the session
    session_start();

    $email_propriate = $_SESSION['mail'];

   // Function to check if an email user exists in the contact table
    function isContact($email_contact, $email_propriate, $pdo) {
        $query = "SELECT COUNT(*) FROM contact WHERE email_contact = :email_contact AND email_propriate = :email_propriate";
        $statement = $pdo->prepare($query);
        $statement->execute([':email_contact' => $email_contact, ':email_propriate' => $email_propriate]);
        $count = $statement->fetchColumn();
        return $count > 0;
    }

    // Function to generate email rows
    function generateEmailRows($rows, $pdo) {
        foreach ($rows as $row) {
            $email_contact = $row["email_user"];
            $isContact = isContact($email_contact, $email_propriate, $pdo);
            $buttonStyle = $isContact ? 'background-color: var(--github-blue); visibility: visible;' : '';
            echo '
            <form class="contactRow" method="post" action="/php_mail/app/controllers/addContactCtl.php">
                <div class="emailRow__options">
                    <span class="material-icons"> label_important </span>
                </div>
                <h4 class="contact_mail" style="margin-left: 2rem;">' . $email_contact . '</h4>
                <input type="text" name="email_contact" value="' . $email_contact . '" style="visibility: hidden;">
                <div style="margin-left: auto;">
                    <button type="submit" class="add_contact" style="' . $buttonStyle . '">
                        <span class="material-icons" style="color: white;">
                            person
                        </span>
                    </button>
                </div>
            </form>
            ';
        }
    }

    try {
        // Prepare the SQL query
        $query = "SELECT email_user FROM user WHERE email_user != :session_mail";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':session_mail', $_SESSION['mail']);

        // Execute the query
        $statement->execute();

        // Fetch email contacts
        $emailRows = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle any errors that occur during the process
        echo "Error executing the query: " . $e->getMessage();
    }
?>

<div class="contactList" id="contact">
  <div class="contactList__list">
    <?php generateEmailRows($emailRows, $pdo); ?>
  </div>
</div>
