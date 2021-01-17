<?php


class PoinMasuk
{
    private $member_id;
    private $tanggal;
    private $status;
    private $jumlah;
    private $sisa;
    private $transaksi_id;
    private $id;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getJumlah()
    {
        return $this->jumlah;
    }

    /**
     * @param mixed $jumlah
     */
    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
    }

    /**
     * @return mixed
     */
    public function getSisa()
    {
        return $this->sisa;
    }

    /**
     * @param mixed $sisa
     */
    public function setSisa($sisa)
    {
        $this->sisa = $sisa;
    }

    /**
     * @return mixed
     */
    public function getTransaksiId()
    {
        return $this->transaksi_id;
    }

    /**
     * @param mixed $transaksi_id
     */
    public function setTransaksiId($transaksi_id)
    {
        $this->transaksi_id = $transaksi_id;
    }


}