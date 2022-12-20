<?php

class Book
{
    private $id;
    private $title;
    private $price;
    private $stock;

    function __construct($id, $price, $stock, $title)
    {
    $this->id = $id;
    $this->price = $price;
    $this->stock = $stock;
    $this->title = $title;
    }

    static function getJasonBooks($filePath){
        $books = array();
        $json = json_decode(file_get_contents($filePath), true);
        foreach ($json as $value){
            $books[] = new Book($value["title"], $value["price"], $value["stock"], $value["title"]);
        }

        return $books;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }



}