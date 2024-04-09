<?php
// Get the database connection instance
$basePath = $_SERVER['DOCUMENT_ROOT'] . "/php_mail/";
require_once $basePath . "config/php/connect.php";

// Start the session
session_start();

// Fetch data from the database
$query = "SELECT email_destination_username, email_destination, objet, contenu, send_time FROM message WHERE email_user = ? ORDER BY send_time DESC";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['mail']]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Map database columns to emailRows keys
$emailRows = array_map(function($row) {
    return [
        "title" => $row["email_destination_username"],
        "username" => $row["email_destination"],
        "message" => $row["objet"],
        "body" => $row["contenu"],
        "time" => $row["send_time"]
    ];
}, $rows);

// Function to generate email rows
function generateEmailRows($rows) {
    foreach ($rows as $row) {
        echo '
        <div class="sentRow">
            <h3 class="sentRow__title">' . $row["title"] . '</h3>
            <div class="sentRow__message">
                <h4>' . $row["message"] . '</h4>
            </div>
            <p class="sentRow__time">' . $row["time"] . '</p>
            <div class="sent_body" style="display: none;">' . $row['body'] .'</div>
            <div class="sent_username" style="display: none;">' . $row['username'] .'</div>
            <div class="sent_mail" style="display: none;">' . $row['title'] .'</div>
        </div>
        ';
    }
}
?>

<div class="sentList" id="sent">
  <div class="sentList__list">
    <?php generateEmailRows($emailRows); ?>
    <div class="sentContent" style="visibility: hidden;">
        <div class="sentHeader">
            <button class="sent_return">
                <span class="material-icons">keyboard_arrow_left</span>
            </button>
            <button class="sent_delete">
                <span class="material-icons">delete</span>
            </button>
        </div>
        <div class="sentBody">
            <h2 class="sentContent__message"></h2><br>
            <div class="sent_info">
                <h4 class="sentContent__title"></h4>
                <h5 class="sentContent__time"></h5>
            </div>
            <div class="sentContent__body" style="margin-top: 2rem;"></div>
        </div>
    </div>
  </div>
</div>