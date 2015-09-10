<?php

namespace PdfGenereationServer\ApiClient\Model;

class Template
{
    /**
     @var string  */
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     @var  array */
    private $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function serialize()
    {
        return json_encode(array('template' => $this->name, 'data' => $this->data));
    }
}