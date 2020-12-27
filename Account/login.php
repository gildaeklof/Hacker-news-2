<?php

declare(strict_types=1);
require('../functions.php');

//Submitted information
$email = $_POST['Email'];
$password = $_POST['Password'];

//Database connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');
$result = $db->query("SELECT * FROM Users WHERE email = '$email'");
$user = $result->fetch(PDO::FETCH_ASSOC);
//Validate password

if ($user) {
    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['user'] = $user;
        createMessage(1, 'Password is correct');
        redirect('/login.php');
    } else {
        createMessage(2, 'Password is not correct');
        redirect('/login.php');
    }
} else {
    createMessage(2, 'Create an account bro');
    redirect('/login.php');
}
