<?php

require_once __DIR__ .'/../vendor/autoload.php';

use PdfGenereationServer\ApiClient\Client as PdfClient;
use PdfGenereationServer\ApiClient\Model\Template;

$client = new PdfClient("denis.alimov", 'password', "http://127.0.0.1:8080");

$data = [];
$data['things'] = [];
$data['things'][] = ['id' => 1, 'name' => 'Apple', 'description' => 'The round fruit of a tree of the rose family, which typically has thin green or red skin and crisp flesh.'];

$template = new Template();
$template->setAccountName('denis.alimov');
$template->setLibraryName('test');
$template->setName('test');
$template->setData($data);

$id = $client->generatePdf($template);

if ($id) {
    echo 'succes', '<br />';
    echo 'id: '.$id;
    // put to queue for example

} else {
    echo 'failure';
}