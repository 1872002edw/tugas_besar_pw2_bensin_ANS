<?php

class PendapatanController
{
    private $pendapatanDao;
    private $cabangDao;

    public function __construct()
    {
        $this->pendapatanDao = new PendapatanDaoImpl();
        $this->cabangDao = new CabangDaoImpl();
    }

    public function index()
    {

        $submitPressed = filter_input(INPUT_POST, "btnHitung");
        $total = $this->pendapatanDao->getTotal();


        $cabang = '';
        $bulan = '';
        $namacabang = 'all';
        if ($submitPressed) {
            //get data dari form
            $cabang = filter_input(INPUT_POST, "cabang");
            $bulan = filter_input(INPUT_POST, "bulan");
            if ($cabang != 'all' && $bulan != 'all') {
                $total = $this->pendapatanDao->getTotalWhereCabangBulan($cabang, $bulan);
            } else if ($cabang == 'all' && $bulan == 'all') {
                $total = $this->pendapatanDao->getTotal();
            } else if ($bulan == 'all') {
                $total = $this->pendapatanDao->getTotalWhereCabang($cabang);
            } else if ($cabang == 'all') {
                $total = $this->pendapatanDao->getTotalWhereBulan($bulan);
            }
            $cabangss = $this->cabangDao->getCabangData();
            foreach ($cabangss as $c) {
                if ($c->getId() == $cabang) {
                    $namacabang = $c->getNamacabang();
                }
            }
        }
        $pendapatans = $this->pendapatanDao->getPendapatanData();
        $cabangs = $this->cabangDao->getCabangData();


        include_once 'pendapatan.php';
    }
}
