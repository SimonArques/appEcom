<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 02/05/2017
 * Time: 16:51
 */
class Application_Model_Cart
{
    private $id;
    private $nbProducts;
    private $totalPrice;
    private $products;

    /**
     * Application_Model_Cart constructor.
     * @param $id
     * @param $nbProducts
     * @param $totalPrice
     */
    public function __construct()
    {

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
    public function getNbProducts()
    {
        return $this->nbProducts;
    }

    /**
     * @param mixed $nbProducts
     */
    public function setNbProducts($nbProducts)
    {
        $this->nbProducts = $nbProducts;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param mixed $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }
    



}