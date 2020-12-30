<?php

declare(strict_types=1);
require('../functions.php');

//Submitted information
$headline = $_POST['Headline'];
$body = $_POST['Body'];

//Other variables
if (isset($_SESSION['user']['name'])) {
    $userName = $_SESSION['user']['name'];
} else {
    $userName = 'IHaveNoName';
}

$dateNow = time();

//Database connection
$db = new PDO('sqlite:../hacker_news_database.sqlite3');
$statement = $db->prepare("INSERT INTO Posts (user_id, header, body, date) VALUES (:user_id, :header, :body, :date)");
$statement->bindParam(':user_id', $_SESSION['user']['id']);
$statement->bindParam(':header', $headline);
$statement->bindParam(':body', $body);
$statement->bindParam(':date', $dateNow);
$statement->bindParam(':date', $dateNow);
$statement->execute();
