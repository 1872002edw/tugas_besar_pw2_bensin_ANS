<?php


class Cabang
{
    private $id;
    private $namacabang;
    private $gambarcabang;

    /**
     * @return mixed
     */
    public function getNamacabang()
    {
        return $this->namacabang;
    }

    /**
     * @param mixed $namacabang
     */
    public function setNamacabang($namacabang)
    {
        $this->namacabang = $namacabang;
    }

    /**
     * @return mixed
     */
    public function getGambarcabang()
    {
        return $this->gambarcabang;
    }

    /**
     * @param mixed $gambarcabang
     */
    public function setGambarcabang($gambarcabang)
    {
        $this->gambarcabang = $gambarcabang;
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}