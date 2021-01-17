<?php
class Total{
    private $pemasukan;
    private $modal;
    private $potongan;
    private $pendapatan;

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
}