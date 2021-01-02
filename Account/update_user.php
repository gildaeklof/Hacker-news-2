<?php

declare(strict_types=1);
require('../functions.php');

//Vars
$name = $_POST['name'];
$email = $_POST['email'];
$password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
$bio = $_POST['bio'];
$user_id = $_SESSION['user']['id'];

print_r($_POST);

//db connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');
$stmt = $db->prepare("UPDATE Users SET name = :name, email = :email, password_hash = :password_hash, bio = :bio WHERE id = :user_id;");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password_hash', $password_hash);
$stmt->bindParam(':bio', $bio);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

createMessage(1, 'Kontot har ändrats');
redirect('/views/index.php');
