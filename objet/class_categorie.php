<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 19/12/18
 * Time: 08:56
 */

class Categorie
{
    Private $id_cat;
    Private $lib_cat;

    public function __construct($id_cat = "" ,$lib_cat = "")
    {
        $this->id_cat = $id_cat;
        $this->lib_cat = $lib_cat;
    }

    /**
     * @return string
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @return string
     */
    public function getLibCat()
    {
        return $this->lib_cat;
    }

    /**
     * @param string $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
    }

    /**
     * @param string $lib_cat
     */
    public function setLibCat($lib_cat)
    {
        $this->lib_cat = $lib_cat;
    }
}