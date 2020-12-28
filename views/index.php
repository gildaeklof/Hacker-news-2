<?php
require('header.php');
require('../functions.php');
logMessage();

//Database connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');

//Fetch posts from database
$result = $db->query("SELECT * FROM Posts");
$posts = $result->fetchAll(PDO::FETCH_ASSOC);

//Fetch all comments on post
$result = $db->query("SELECT * FROM Comments WHERE post_id = 1");
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
print_r($comments);
?>

<body>
    <a href="/views/login.php">Login</a>

    <?php foreach ($posts as $post) : ?>
        <?php

        $userId = $post['user_id'];

        //Fetch users from database
        $result = $db->query("SELECT * FROM Users WHERE id = $userId");
        $user = $result->fetch(PDO::FETCH_ASSOC);

        //If user has a name, set it to $userName
        if (isset($user['name'])) {
            $userName = $user['name'];
        } else {
            $userName = 'IHaveNoName';
        }

        ?>
        <div class="post">
            <div class="date-section">
                <div class="left">
                    <img src="/images/photo-1609050470947-f35aa6071497.jpeg" alt="">
                    <p class="name"><?= $userName ?></p>
                </div>
                <div class="right">
                    <p class="date"><?= date('D M Y H:i', $post['date']) ?></p>
                </div>
            </div>
            <div class="image-section">
                <img src="/images/photo-1609050470947-f35aa6071497.jpeg" alt="">
            </div>
            <div class="text-section">
                <div class="text-section-text">
                    <h2><?= $post['header'] ?></h2>
                    <p><?= $post['body'] ?></p>
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
                <div class="left">
                    <button>comment</button>
                </div>
                <?php if (isset($_SESSION['user']) && $post['user_id'] === $_SESSION['user']['id']) : ?>
                    <div class="right">
                        <button class="edit-button">Edit</button>
                        <button class="delete-button">Delete</button>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <div class="comment">
            <div class="upper">
                <div class="left">
                    <img src="/images/photo-1609050470947-f35aa6071497.jpeg" alt="">
                    <p class="name">Name</p>
                </div>
                <div class="right">
                    <p class="date">Date</p>
                </div>
            </div>
            <div class="lower">
                <div class="left">
                    <p class="comment-paragraph">This is a comment</p>
                </div>
                <div class="right">
                    <button class="edit-button button">Edit</button>
                    <button class="delete-button button">Delete</button>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <script src="./script.js"></script>
</body>

<?php require('footer.php') ?>