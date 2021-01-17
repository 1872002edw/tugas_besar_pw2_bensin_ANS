<?php

class MemberController
{
    private $memberDao;
    private $userDao;
    private $PoinMasuk;
    private $PoinKeluar;
    private $Transaksi;

    public function __construct()
    {
        $this->memberDao = new MemberDaoImpl();
        $this->userDao = new UserDaoImpl();
        $this->PoinMasuk = new PoinMasukDaoImpl();
        $this->PoinKeluar = new PoinKeluarDaoImpl();
        $this->Transaksi = new TransaksiDaoImpl();
    }

    public function index()
    {
        // $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        // if ($submitPressed) {
        //     //get Data dari form
        //     $modalpertamax = filter_input(INPUT_POST, "modalpertamax");
        //     if ($resultPertamax && $resultPertamaxT && $resultPertalite && $resultSolar) {
        //         echo '<div class="bg-success">Harga berhasil diperbaharui</div>';
        //     } else {
        //         echo '<div class="bg-error">Harga gagal diperbaharui</div>';
        //     }
        // }

        $userid = $_SESSION['session_id'];
        $memberid = $_SESSION['session_member'];
        $user = $this->userDao->getUserWhereIdIs($userid);
        $member = $this->memberDao->getMemberIdIs($memberid);

        $poinmasuk = $this -> PoinMasuk->getPoinMasukid($memberid);
        $poinkeluar = $this -> PoinKeluar-> getPoinKeluarid($memberid);

        $gettrans = $this -> Transaksi -> getTransId($memberid);

        $submitPressed = filter_input(INPUT_POST, "btnUbah");

        if ($submitPressed) {

            //get data dari form
            $nama = filter_input(INPUT_POST, "nama");
            $email = filter_input(INPUT_POST, "email");
            $_birthday = filter_input(INPUT_POST, "birthday");
            $birthday = date('Y/m/d', strtotime($_birthday));
            $mobil = filter_input(INPUT_POST, "mobil");
            $motor = filter_input(INPUT_POST, "motor");

            $updatedMember = new Member();
            $updatedMember->setTgllahir($birthday);
            $updatedMember->setMobil($mobil);
            $updatedMember->setMotor($motor);
            $updatedMember->setId($memberid);

            $updateUser = new User();
            $updateUser->setNama($nama);
            $updateUser->setEmail($email);
            $updateUser->setId($userid);
            $member = $this->memberDao->updateMember($updatedMember);
            $user = $this->userDao -> updateUser($updateUser);
        }

        $submitPressedr = filter_input(INPUT_POST, "btnRating");

        if ($submitPressedr) {
            //get data dari form
            $rating = filter_input(INPUT_POST, "rating");
            $id = filter_input(INPUT_POST, "id");

            $updatedTransaksi = new Transaksi();
            $updatedTransaksi->setRating($rating);
            $updatedTransaksi->setId($id);

            $gettrans = $this->Transaksi->updateTrans($updatedTransaksi);
        }

        
        include_once 'member.php';
    }
}