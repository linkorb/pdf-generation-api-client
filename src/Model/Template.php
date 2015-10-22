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

        return $this;
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

        return $this;
    }

    private $accountName;

    /**
     * @return mixed
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param mixed $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;

        return $this;
    }


    private $libraryName;

    /**
     * @return mixed
     */
    public function getLibraryName()
    {
        return $this->libraryName;
    }

    /**
     * @param mixed $libraryName
     */
    public function setLibraryName($libraryName)
    {
        $this->libraryName = $libraryName;

        return $this;
    }


    public function serialize()
    {
        return json_encode($this->data);
    }
}