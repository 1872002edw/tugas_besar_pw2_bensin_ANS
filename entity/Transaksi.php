<?php


class Transaksi
{
    private $id;
    private $tanggal;
    private $modal;
    private $harga;
    private $banyak;
    private $potongan;
    private $total;
    private $subtotal;
    private $rating;
    private $member_id;
    private $cabang_id;
    private $bbm_id;
    private $pegawai_id;
    private $jenis;
    private $namamember;

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
    public function getBanyak()
    {
        return $this->banyak;
    }

    /**
     * @param mixed $banyak
     */
    public function setBanyak($banyak)
    {
        $this->banyak = $banyak;
    }

    /**
     * @return mixed
     */
    public function getPotongan()
    {
        return $this->potongan;
    }

    /**
     * @param mixed $potongan
     */
    public function setPotongan($potongan)
    {
        $this->potongan = $potongan;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param mixed $subtotal
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * @param mixed $member_id
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;
    }

    /**
     * @return mixed
     */
    public function getCabangId()
    {
        return $this->cabang_id;
    }

    /**
     * @param mixed $cabang_id
     */
    public function setCabangId($cabang_id)
    {
        $this->cabang_id = $cabang_id;
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

    /**
     * @return mixed
     */
    public function getPegawaiId()
    {
        return $this->pegawai_id;
    }

    /**
     * @param mixed $pegawai_id
     */
    public function setPegawaiId($pegawai_id)
    {
        $this->pegawai_id = $pegawai_id;
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
     * Get the value of harga
     */
    public function getHarga()
    {
        return $this->harga;
    }

    /**
     * Set the value of harga
     *
     * @return  self
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;

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
     * Get the value of namamember
     */ 
    public function getNamamember()
    {
        return $this->namamember;
    }

    /**
     * Set the value of namamember
     *
     * @return  self
     */ 
    public function setNamamember($namamember)
    {
        $this->namamember = $namamember;

        return $this;
    }
}
