<?php

require('header.php');
require('../functions.php');
$userId = $_SESSION['user']['id'];

//Database connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');

if (!$_SESSION['user']) {
    redirect('/views/login.php');
} else {
    $result = $db->query("SELECT * FROM USERS WHERE id = $userId");
    $userData = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $userData;
}



?>

<body>
    <section class="top">
        <h1>Account</h1>
        <img src="<?= $_SESSION['user']['avatar_path'] ?>" alt="" class="profile-image">
    </section>
    <section class="form">
        <form action="/Account/update_user.php" method="post" enctype="multipart/form-data">

            <label for="file">Image</label>
            <input type="file" name="file" id="file">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="email">Password</label>
            <input type="text" name="password" id="password">
            <label for="email">Bio</label>
            <input type="text" name="bio" id="bio">
            <input type="submit" value="Save">
        </form>
    </section>

</body>



<?php require('footer.php') ?>