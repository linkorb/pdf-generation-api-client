<?php

include_once __dir__ . '/../vendor/autoload.php';
use PdfGenereationServer\ApiClient\Client;
use PdfGenereationServer\ApiClient\Model\Template;

$client = new Client("user", "user", "http://127.0.0.1:8080");

$data = [];
$data['things'] = [];
$data['things'][] = ['id' => 1, 'name' => 'Apple', 'description' => 'The round fruit of a tree of the rose family, which typically has thin green or red skin and crisp flesh.'];

$template = new Template();
$template->setName('things index part');
$template->setData($data);

$id = $client->generatePdf($template);

if ($id) {
    echo 'succes';

    // put to queue for example

} else {
    echo 'failure';
}
