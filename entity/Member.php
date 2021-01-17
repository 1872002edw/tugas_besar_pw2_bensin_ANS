<?php


class member
{
    private $id;
    private $tgllahir;
    private $poin;
    private $mobil;
    private $motor;
    private $nama;
    private $email;

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
    public function getTgllahir()
    {
        return $this->tgllahir;
    }

    /**
     * @param mixed $tgllahir
     */
    public function setTgllahir($tgllahir)
    {
        $this->tgllahir = $tgllahir;
    }

    /**
     * @return mixed
     */
    public function getPoin()
    {
        return $this->poin;
    }

    /**
     * @param mixed $poin
     */
    public function setPoin($poin)
    {
        $this->poin = $poin;
    }

    /**
     * @return mixed
     */
    public function getMobil()
    {
        return $this->mobil;
    }

    /**
     * @param mixed $mobil
     */
    public function setMobil($mobil)
    {
        $this->mobil = $mobil;
    }

    /**
     * @return mixed
     */
    public function getMotor()
    {
        return $this->motor;
    }

    /**
     * @param mixed $motor
     */
    public function setMotor($motor)
    {
        $this->motor = $motor;
    }


    /**
     * Get the value of nama
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Set the value of nama
     *
     * @return  self
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
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
