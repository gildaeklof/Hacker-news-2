<?php

require('header.php');
require('../functions.php');
if (!$_SESSION['user']) {
    redirect('/views/login.php');
}

//Database connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');
?>

<body>
    <section class="top">
        <h1>Account</h1>
        <img src="" alt="" class="profile-image">
        <button class="edit-image"></button>
    </section>
    <section class="form">
        <form action="/Account/update_user.php" method="POST">
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