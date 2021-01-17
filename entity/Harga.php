<?php

class Harga
{
    private $id;
    private $tanggal;
    private $modal;
    private $jual;
    private $bbm_id;

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
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * @param mixed $tanggal
     */
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    /**
     * @return mixed
     */
    public function getModal()
    {
        return $this->modal;
    }

    /**
     * @param mixed $modal
     */
    public function setModal($modal)
    {
        $this->modal = $modal;
    }

    /**
     * @return mixed
     */
    public function getJual()
    {
        return $this->jual;
    }

    /**
     * @param mixed $jual
     */
    public function setJual($jual)
    {
        $this->jual = $jual;
    }

    /**
     * @return mixed
     */
    public function getBbmId()
    {
        return $this->bbm_id;
    }

    /**
     * @param mixed $bbm_id
     */
    public function setBbmId($bbm_id)
    {
        $this->bbm_id = $bbm_id;
    }
}
