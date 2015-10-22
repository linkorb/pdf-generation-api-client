<?php

include_once __dir__ . '/../vendor/autoload.php';

use PdfGenereationServer\ApiClient\Client;

$client = new Client("denis.alimov", "password", "http://127.0.0.1:8080");

$file = $client->downloadPdf("82e40d63-abff-4a98-9ecf-02577a39c1a0");
if ($file) {
    // persist to db
    // or save to disk
    // or force download in browser

    // continue
} else {
    echo 'no such file';
}