<?php


class Pegawai
{
    private $id;
    private $cabang_id;
    private $nama;
    private $tanggal;
    private $email;
    private $banyak;
    private $namacabang;
    private $rating;

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNama($nama)
    {
        $this->nama = $nama;
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}