<?php

declare(strict_types=1);
session_start();
if (isset($_SESSION['errors'])) {
} else {
    $_SESSION['errors'] = [];
}

function createError(string $errorMessage)
{
    array_push($_SESSION['errors'], $errorMessage);
}

function logErrors(bool $allErrors = false)
{

    if ($allErrors) {
        foreach ($_SESSION['errors'] as $error) {
            echo $error;
        }
    } else {
        echo end($_SESSION['errors']);
    }
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
