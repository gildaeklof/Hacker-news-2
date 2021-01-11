<?php
require '../functions.php';

//Input data 
$data = json_decode(file_get_contents('php://input'));

print_r($data);

$db = new PDO('sqlite:../hacker_news_database.sqlite3');
$stmt = $db->prepare("UPDATE Users SET avatar_path = :file_destination WHERE id = :user_id");
$stmt->bindParam(':file_destination', $file_relative_path);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
