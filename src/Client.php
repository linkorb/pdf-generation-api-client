<?php

namespace PdfGenereationServer\ApiClient;

use PdfGenereationServer\ApiClient\Model\SomeModel;
use GuzzleHttp\Client as GuzzleClient;
use PdfGenereationServer\ApiClient\Model\Template;

class Client
{
    private $user;
    private $password;
    private $url;

    public function __construct($user, $password, $url)
    {
        $this->user = $user;
        $this->password = $password;
        $this->url = $url;
    }


    public function generatePdf(Template $template)
    {
        $guzzleclient = new GuzzleClient();

        $res = $guzzleclient->post($this->url.'/api/v1', ['auth' => [$this->user, $this->password], 'headers' => ['content-type' =>
            'application/json'], 'body' => $template->serialize() ]);
        if ($res->getStatusCode() == 201)
        {
            return json_decode($res->getBody(), true)['id'];
        }
    }

    public function downloadPdf($id)
    {
        $guzzleclient = new GuzzleClient();
        $url = $this->url . '/api/v1/file/' . $id;

        $res = $guzzleclient->get($url, ['auth' => [$this->user, $this->password], 'headers' => ['content-type' =>
            'application/json']]);

        if ($res->getStatusCode() == 200)
            return 1;
            //return json_decode($res->getBody(), true);

        //return array();
    }
}