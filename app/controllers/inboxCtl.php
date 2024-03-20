<?php
$emailRows = [
    [
        "title" => "Inbox",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ],

    [
        "title" => "YouTube",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ],

    [
        "title" => "YouTube",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ],

    [
        "title" => "YouTube",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ],

    [
        "title" => "YouTube",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ],

    [
        "title" => "YouTube",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ],

    [
        "title" => "YouTube Last",
        "message" => "You Got a New Subscriber",
        "description" => "on Your Channel Future Coders",
        "time" => "10pm"
    ]
];

// Function to generate email rows
function generateEmailRows($rows) {
    foreach ($rows as $row) {
        echo '<div class="emailRow">
                <div class="emailRow__options">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <!-- <span class="material-icons"> star_border </span> -->
                    <!-- <span class="material-icons"> label_important </span> -->
                </div>
                <h3 class="emailRow__title">' . $row["title"] . '</h3>
                <div class="emailRow__message">
                    <h4>' . $row["message"] . '<span class="emailRow__description"> - ' . $row["description"] . '</span></h4>
                </div>
                <p class="emailRow__time">' . $row["time"] . '</p>
            </div>';
    }
}

?>

<div class="emailList" id="inbox">
  <div class="emailList__list">
    <?php generateEmailRows($emailRows); ?>
  </div>
</div>
