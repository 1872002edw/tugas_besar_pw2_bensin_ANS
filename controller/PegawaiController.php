<?php


class PegawaiController
{
    private $pegawaiDao;
    private $cabangDao;
    private $user;

    public function __construct()
    {
        $this->pegawaiDao = new PegawaiDaoImpl();
        $this->cabangDao = new CabangDaoImpl();
        $this->user = new UserDaoImpl();
        $this->transaksi = new TransaksiDaoImpl();
    }

    public function index(){

        $cabang = $this->cabangDao->getCabangData();

        $submitPressed = filter_input(INPUT_POST, "btnCabang");

        if ($submitPressed) {

            //get data dari form
            $cbg = filter_input(INPUT_POST, "cabang");
                $userpeg = $this->user->getUserPeg($cbg);
                $cabangpg = $this->cabangDao->getCabangPg($cbg);
                $userat = $this->pegawaiDao->getUserPegTrans($cbg);
        }
        else{
            $userpeg = $this->user->getUserPeg(1);
            $cabangpg = $this->cabangDao->getCabangPg(1);
            $userat = $this->pegawaiDao->getUserPegTrans(1);
        }
        include_once 'eom.php';
    }

    public function updatePeg(){
        $cid = filter_input(INPUT_GET, 'cid');
        if (isset($cid)){
            $cekupdate = $this->user -> getUserWhereIdIs($cid);
            $cekupdatep = $this->pegawaiDao -> setiidcobs($cid);
        }

        $pilihcabang = $this->cabangDao->getCabangData();

        $submitPressed = filter_input(INPUT_POST, "btnUbah");

        if ($submitPressed) {
            $id = filter_input(INPUT_POST, "id");
            $nama = filter_input(INPUT_POST, "nama");
            $username = filter_input(INPUT_POST, "username");
            $email  = filter_input(INPUT_POST, "email");
            $cabang  = filter_input(INPUT_POST, "cabang");

            $updateuser = new User();
            $updateuser->setNama($nama);
            $updateuser->setUsername($username);
            $updateuser->setEmail($email);
            $updateuser->setId($cid);
            $upduser = $this->user -> upduspeg($updateuser);

            $updatecabang = new Pegawai();
            $updatecabang->setCabangId($cabang);
            $updatecabang->setId($id);
            $updcabang = $this->pegawaiDao->updpeg($updatecabang);
        }
        include_once 'updatepegawai.php';
    }


}