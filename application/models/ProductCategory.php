<?php

/**
 * Created by PhpStorm.
 * User: EVER
 * Date: 02/05/2017
 * Time: 16:51
 */
class Application_Model_ProductCategory
{
    private $id;
    private $categoryName;

    /**
     * Application_Model_ProductCategory constructor.
     * @param $id
     * @param $categoryName
     */
    public function __construct($id, $categoryName)
    {
        $this->id = $id;
        $this->categoryName = $categoryName;
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
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param mixed $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }




}