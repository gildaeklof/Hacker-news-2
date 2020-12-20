<?php

declare(strict_types=1);

//Submitted information
$email = $_POST['Email'];
$password = $_POST['Password'];

//Database connection
$db = new PDO('sqlite:hacker_news_database.sqlite3');
$result = $db->query("SELECT * FROM Users WHERE email = '$email'");
$data = $result->fetch(PDO::FETCH_ASSOC);

//Validate password
if (password_verify($password, $data['password_hash'])) {
    echo 'Password is correct';
} else {
    echo 'Password is not correct';
}
