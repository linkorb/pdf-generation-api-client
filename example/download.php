<?php

include_once __dir__ . '/../vendor/autoload.php';
use PdfGenereationServer\ApiClient\Client;
use PdfGenereationServer\ApiClient\Model\File;

$client = new Client("user", "user", "http://127.0.0.1:8080");

$file = $client->downloadPdf("00e70a6d-f8c9-45ad-b04e-a41e1f810bf7");
if ($file) {

    // persist to db
    // or save to disk
    // or force download in browser

    // continue
} else {
    echo 'no such file';
}
