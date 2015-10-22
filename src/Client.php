<?php

namespace PdfGenereationServer\ApiClient;

use GuzzleHttp\Client as GuzzleClient;
use PdfGenereationServer\ApiClient\Model\Template;
use PdfGenereationServer\ApiClient\Model\File;

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

        $res = $guzzleclient->post($this->url.'/api/v1/'.$template->getAccountName().'/'.$template->getLibraryName().'/'.$template->getName(),
                                   ['auth' => [$this->user, $this->password], 'headers' => ['content-type' =>
                                        'application/json'], 'body' => $template->serialize() ]);
        if ($res->getStatusCode() == 201)
        {
            return json_decode($res->getBody(), true)['id'];
        }
    }

    public function downloadPdf($id)
    {
        $guzzleclient = new GuzzleClient();
        $url = $this->url . '/api/v1/document/' . $id;

        $res = $guzzleclient->get($url, ['auth' => [$this->user, $this->password], 'headers' => ['content-type' =>
            'application/json']]);



        if ($res->getStatusCode() == 200) {
            $file = new File();
            $content = base64_decode(json_decode($res->getBody(), true)['content']);

            $file->setName($id.'.pdf');
            $file->setMimeType('application/pdf');
            $file->setContent($content);
            $file->setSize(strlen($content));

            return $file;
        }
    }
}