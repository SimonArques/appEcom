<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 02/05/2017
 * Time: 15:33
 */
class Application_Model_Product
{

    private $id;
    private $name;
    private $price;
    private $desc;
    private $quantity;

    /**
     * Product constructor.
     * @param string $name
     * @param int $price
     * @param string $desc
     */
    public function __construct($name, $price, $desc, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->desc = $desc;
        $this->quantity = $quantity;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}

class Application_Model_ProductMapper{

    public function fetchAll(){}
}