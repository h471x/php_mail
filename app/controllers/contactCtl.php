<?php
    // Get the database connection instance
    $basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
    require_once $basePath . "config/php/connect.php";

    // start the session
    session_start();

    try {
        // Prepare the SQL query
        $query = "SELECT email_user FROM user WHERE email_user != :session_mail";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':session_mail', $_SESSION['mail']);

        // Execute the query
        $statement->execute();

        // Fetch email contacts
        $emailRows = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Function to generate email rows
        function generateEmailRows($rows) {
            // Check if $_SESSION['mail'] is set and not empty
            if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) {
                // Display $_SESSION['mail'] at the first row
                echo '
                <div class="contactRow">
                    <div class="emailRow__options">
                        <span class="material-icons"
                            style="color: var(--primary-color);">
                            star_border
                        </span>
                    </div>
                    <h4 class="contact_mail" style="margin-left: 2rem;">' . $_SESSION['mail'] . '</h4>
                </div>
                ';
            }

            // Display other email rows
            foreach ($rows as $row) {
                echo '
                <div class="contactRow">
                    <div class="emailRow__options">
                        <span class="material-icons"> label_important </span>
                    </div>
                    <h4 class="contact_mail" style="margin-left: 2rem;">' . $row["email_user"] . '</h4>
                    <div style="margin-left: auto;">
                        <button class="add_contact" style="background-color: var(--github-blue); visibility: visible;">
                            <span class="material-icons" style="color: white;">
                                person
                            </span>
                        </button>
                    </div>
                </div>
                ';
            }
        }
    } catch (PDOException $e) {
        // Handle any errors that occur during the process
        echo "Error executing the query: " . $e->getMessage();
    }

    // Close the database connection (optional for PDO, as it's automatically closed when the script ends)
    //$pdo = null;
?>

<div class="contactList" id="contact">
  <div class="contactList__list">
    <?php generateEmailRows($emailRows); ?>
  </div>
</div>