<?php

class TransaksiController{
    private $transaksiDao;
    private $pegawaiDao;
    private $hargaDao;
    private $memberDao;

    public function __construct()
    {
        $this->transaksiDao = new TransaksiDaoImpl();
        $this->hargaDao = new HargaDaoImpl();
        $this->pegawaiDao = new PegawaiDaoImpl();
        $this->memberDao = new MemberDaoImpl();
    }

    public function index()
    {
        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if ($submitPressed) {
            //get Data dari database
            $pegawaiId = $_SESSION['session_pegawai'];
            $pegawai = $this->pegawaiDao->getPegawaiWhereIdIs($pegawaiId);
            $cabangId = $pegawai->getCabangId();



            //get Data dari form
            $member = filter_input(INPUT_POST, "member");
            $kuantitas = filter_input(INPUT_POST, "kuantitas");
            $total = filter_input(INPUT_POST, "total");
            $npotongan = filter_input(INPUT_POST, "npotongan");
            $potongan = filter_input(INPUT_POST, "potongan");
            $subtotal = filter_input(INPUT_POST, "subtotal");
            $bbmid = filter_input(INPUT_POST, "jenisbbm");
            
            $_bbm = $this->hargaDao->getLatestHargaWhereBBMIdIs($bbmid);
            $modal = $_bbm->getModal() * $kuantitas;
            $harga = $_bbm->getJual();
            $subtotal = $total - $potongan;

            // $query = "INSERT INTO transaksi (tanggal, banyak, potongan, total, subtotal, rating, member_id, cabang_id, bbm_id, pegawai_id) VALUES (NOW(),?,?,?,?,?,?,?,?,?)";
            // //buat object Transaksi
            $transaksi = new Transaksi();
            $transaksi->setBanyak($kuantitas);
            $transaksi->setPotongan($potongan);
            $transaksi->setModal($modal);
            $transaksi->setHarga($harga);
            $transaksi->setTotal($total);
            $transaksi->setSubtotal($subtotal);
            if($member!=''){
                $transaksi->setMemberId($member);
            }
            $transaksi->setCabangId($cabangId);
            $transaksi->setBbmId($bbmid);
            $transaksi->setPegawaiId($pegawaiId);

            //trigger_error("member:".$member."kuanti:".$kuantitas."tota:".$total."npton:".$npotongan."potong;".$potongan."subtotal;".$subtotal.";"."bbm;".$bbmid);
                       
            $result = $this->transaksiDao->insertTransaksi($transaksi);
            if ($result) {
                echo '<div class="bg-success">Transaksi berhasil</div>';
            } else {
                echo '<div class="bg-error">Transaksi gagal</div>';
            }
        }

        $pertamax = $this->hargaDao->getLatestHargaWhereBBMIdIs(1);
        $pertamaxt = $this->hargaDao->getLatestHargaWhereBBMIdIs(2);
        $pertalite = $this->hargaDao->getLatestHargaWhereBBMIdIs(3);
        $solar = $this->hargaDao->getLatestHargaWhereBBMIdIs(4);

        $transaksipegawais = $this->transaksiDao->getTransaksiDataWherePegawaiIs($_SESSION['session_pegawai']);
        $members = $this->memberDao->getMemberData();
        include_once 'transaksi.php';
    }

}
?>