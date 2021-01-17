<?php

class Pendapatan{
    private $tanggal;
    private $jenis;
    private $banyak;
    private $pemasukan;
    private $modal;
    private $potongan;
    private $pendapatan;
    private $cabang;


    /**
     * Get the value of tanggal
     */ 
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * Set the value of tanggal
     *
     * @return  self
     */ 
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

    /**
     * Get the value of jenis
     */ 
    public function getJenis()
    {
        return $this->jenis;
    }

    /**
     * Set the value of jenis
     *
     * @return  self
     */ 
    public function setJenis($jenis)
    {
        $this->jenis = $jenis;

        return $this;
    }

    /**
     * Get the value of banyak
     */ 
    public function getBanyak()
    {
        return $this->banyak;
    }

    /**
     * Set the value of banyak
     *
     * @return  self
     */ 
    public function setBanyak($banyak)
    {
        $this->banyak = $banyak;

        return $this;
    }

    /**
     * Get the value of pemasukan
     */ 
    public function getPemasukan()
    {
        return $this->pemasukan;
    }

    /**
     * Set the value of pemasukan
     *
     * @return  self
     */ 
    public function setPemasukan($pemasukan)
    {
        $this->pemasukan = $pemasukan;

        return $this;
    }

    /**
     * Get the value of modal
     */ 
    public function getModal()
    {
        return $this->modal;
    }

    /**
     * Set the value of modal
     *
     * @return  self
     */ 
    public function setModal($modal)
    {
        $this->modal = $modal;

        return $this;
    }

    /**
     * Get the value of potongan
     */ 
    public function getPotongan()
    {
        return $this->potongan;
    }

    /**
     * Set the value of potongan
     *
     * @return  self
     */ 
    public function setPotongan($potongan)
    {
        $this->potongan = $potongan;

        return $this;
    }

    /**
     * Get the value of pendapatan
     */ 
    public function getPendapatan()
    {
        return $this->pendapatan;
    }

    /**
     * Set the value of pendapatan
     *
     * @return  self
     */ 
    public function setPendapatan($pendapatan)
    {
        $this->pendapatan = $pendapatan;

        return $this;
    }

    

    /**
     * Get the value of cabang
     */ 
    public function getCabang()
    {
        return $this->cabang;
    }

    /**
     * Set the value of cabang
     *
     * @return  self
     */ 
    public function setCabang($cabang)
    {
        $this->cabang = $cabang;

        return $this;
    }
}