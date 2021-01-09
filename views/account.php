<?php

require('header.php');
require('../functions.php');
$userId = $_SESSION['user']['id'];
logMessage();

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
            <input placeholder="<?php echo $_SESSION['user']['email'] ?>" type="text" name="email" id="email">
            <label for="name">Name</label>
            <input placeholder="<?php echo $_SESSION['user']['name'] ?>" type="text" name="name" id="name">
            <label for="password">Password</label>
            <input placeholder="***********" type="text" name="password" id="password">
            <label for="bio">Bio</label>
            <input placeholder="<?php echo $_SESSION['user']['bio'] ?>" type="text" name="bio" id="bio">
            <input type="submit" value="Save">
        </form>
    </section>

</body>


<?php createMessage(3) ?>
<?php require('footer.php') ?>