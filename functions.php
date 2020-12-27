<?php

declare(strict_types=1);
session_start();
if (isset($_SESSION['message'])) {
} else {
    $_SESSION['message'] = [];
}

function createMessage(int $type, string $message)
{
    $messageArray = ['type' => $type, 'message' => $message];
    array_push($_SESSION['message'], $messageArray);
}

function logMessage()
{
    if (end($_SESSION['message'])['type'] !== 3)
        print_r(end($_SESSION['message'])['message']);
}

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// function errorLog(string $errorMessage)
// {
//     $errors = file_get_contents(__DIR__ . '/errors.json');
//     $decodedJSON = json_decode($errors);
//     $errorObject = new stdClass;
//     $errorObject->error = $errorMessage;
//     $decodedJSON[] = $errorObject;
//     $encodedJSON = json_encode($decodedJSON);
//     file_put_contents('../errors.json', $encodedJSON);
// }

// function errorPrint()
// {
//     $errors = file_get_contents(__DIR__ . '/errors.json');
//     $decodedJSON = json_decode($errors);
//     foreach ($decodedJSON as $error) {
//         echo $error->error;
//     }
// }
