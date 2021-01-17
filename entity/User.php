<?php


class User
{
    private $id;
    private $nama;
    private $username;
    private $password;
    private $role;
    private $email;
    private $member_id;
    private $pegawai_id;
    private $namacabang;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * Get the value of namacabang
     */
    public function getNamacabang()
    {
        return $this->namacabang;
    }

    /**
     * Set the value of namacabang
     *
     * @return  self
     */
    public function setNamacabang($namacabang)
    {
        $this->namacabang = $namacabang;

        return $this;
    }
}
