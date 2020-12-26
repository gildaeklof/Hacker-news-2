<?php

declare(strict_types=1);
require('../functions.php');
session_start();
$email = $_POST['Email'];
$password_hash = password_hash($_POST['Password'], PASSWORD_BCRYPT);

//Check if email exists
$db = new PDO('sqlite:../hacker_news_database.sqlite3');
$result = $db->query("SELECT * FROM Users WHERE email = '$email'");
$data = $result->fetch(PDO::FETCH_ASSOC);

if (isset($data['email'])) { //Email already exists
    createError('This email is already in use');
    redirect('../login.php');
} else {  //Email is available
    //Export new user to database
    echo 'Email is not in use';
    $db = new PDO('sqlite:../hacker_news_database.sqlite3');
    $stmt = $db->prepare('INSERT INTO Users (email, password_hash)
    VALUES(:email, :password_hash)');

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password_hash', $password_hash);
    $stmt->execute();
}
