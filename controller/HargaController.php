<?php

class HargaController
{
    private $hargaDao;

    public function __construct()
    {
        $this->hargaDao = new HargaDaoImpl();
    }

    public function index()
    {
        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if ($submitPressed) {
            //get Data dari form
            $modalpertamax = filter_input(INPUT_POST, "modalpertamax");
            $jualpertamax = filter_input(INPUT_POST, "jualpertamax");
            $modalpertamaxt = filter_input(INPUT_POST, "modalpertamaxt");
            $jualpertamaxt = filter_input(INPUT_POST, "jualpertamaxt");
            $modalpertalite = filter_input(INPUT_POST, "modalpertalite");
            $jualpertalite = filter_input(INPUT_POST, "jualpertalite");
            $modalsolar = filter_input(INPUT_POST, "modalsolar");
            $jualsolar = filter_input(INPUT_POST, "jualsolar");


            //buat object Pertamax
            $hargaPertamax = new Harga();
            $hargaPertamax->setModal($modalpertamax);
            $hargaPertamax->setJual($jualpertamax);
            $hargaPertamax->setBbmId(1);

            //buat object Pertamax Turbo
            $hargaPertamaxT = new Harga();
            $hargaPertamaxT->setModal($modalpertamaxt);
            $hargaPertamaxT->setJual($jualpertamaxt);
            $hargaPertamaxT->setBbmId(2);

            //buat object Pertalite
            $hargaPertalite = new Harga();
            $hargaPertalite->setModal($modalpertalite);
            $hargaPertalite->setJual($jualpertalite);
            $hargaPertalite->setBbmId(3);

            //buat object Solar
            $hargaSolar = new Harga();
            $hargaSolar->setModal($modalsolar);
            $hargaSolar->setJual($jualsolar);
            $hargaSolar->setBbmId(4);


            $resultPertamax = $this->hargaDao->insertHarga($hargaPertamax);
            $resultPertamaxT = $this->hargaDao->insertHarga($hargaPertamaxT);
            $resultPertalite = $this->hargaDao->insertHarga($hargaPertalite);
            $resultSolar = $this->hargaDao->insertHarga($hargaSolar);
            if ($resultPertamax && $resultPertamaxT && $resultPertalite && $resultSolar) {
                echo '<div class="bg-success">Harga berhasil diperbaharui</div>';
            } else {
                echo '<div class="bg-error">Harga gagal diperbaharui</div>';
            }
        }

        $hargas = $this->hargaDao->getHargaData();
        $pertamax = $this->hargaDao->getLatestHargaWhereBBMIdIs(1);
        $pertamaxt = $this->hargaDao->getLatestHargaWhereBBMIdIs(2);
        $pertalite = $this->hargaDao->getLatestHargaWhereBBMIdIs(3);
        $solar = $this->hargaDao->getLatestHargaWhereBBMIdIs(4);
        include_once 'harga.php';
    }

}
