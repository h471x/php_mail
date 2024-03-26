<?php
$emailRows = [
    [
        "title" => "Sent",
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
        echo '
        <div class="emailRow">
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
        </div>
        ';
    }
}
?>

<div class="emailList" id="sent">
  <div class="emailList__list">
    <?php generateEmailRows($emailRows); ?>
    <div class="emailContent" style="visibility: hidden;">
        <div class="contentHeader">
            <button class="return">
                <span class="material-icons">keyboard_arrow_left</span>
            </button>
            <button class="delete">
                <span class="material-icons">delete</span>
            </button>
        </div>
        <div class="contentBody">
            <h2 class="emailContent__message"></h2><br>
            <div class="mail_info">
                <h4 class="emailContent__title"></h4>
                <h5 class="emailContent__time"></h5>
            </div>
            <!-- <p class="emailContent__description"></p> -->
        </div>
    </div>
  </div>
</div>