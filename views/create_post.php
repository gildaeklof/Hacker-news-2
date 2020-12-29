<?php
require('header.php');
require('../functions.php');
logMessage();

$_SESSION['user']['name'];

if (isset($_SESSION['user']['name'])) {
    $userName = $_SESSION['user']['name'];
} else {
    $userName = 'IHaveNoName';
}

//Database connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');
?>
<form action="">
    <div class="post">
        <div class="date-section">
            <div class="left">
                <img src="/images/photo-1609050470947-f35aa6071497.jpeg" alt="">
                <p class="name"><?= $userName ?></p>
            </div>
            <div class="right">
                <p class="date"><?= 'future date' ?></p>
            </div>
        </div>
        <div class="image-section">
            <img src="/images/photo-1609050470947-f35aa6071497.jpeg" alt="">
        </div>
        <div class="text-section">
            <div class="text-section-text">
                <input class="headline" placeholder="Headline" type="text" name="Headline" id="Headline">
                <input class="body" placeholder="This is an interesting block of text" type="text" name="Body" id="Body">
            </div>
            <div class="text-section-vote">
                <div class="img-container">
                    <img class="upvote" src="/assets/up-arrow.svg" alt="">
                </div>
                <p>42</p>
                <div class="img-container">
                    <img class="downvote" src="/assets/down-arrow.svg" alt="">
                </div>
            </div>
        </div>
        <div class="bottom-section">
        </div>
</form>