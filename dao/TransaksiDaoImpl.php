<?php
class TransaksiDaoImpl
{
    public function getTransaksiData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT id, tanggal, modal, harga, banyak, potongan, total, subtotal, rating, member_id, cabang_id, bbm_id, pegawai_id FROM transaksi";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Transaksi');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function getTransaksiDataWherePegawaiIs($pegawaiid)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT t.id, tanggal, u.nama AS namamember, jenis, harga, banyak, potongan, total, subtotal FROM transaksi t 
        LEFT JOIN user u ON u.member_id = t.member_id JOIN bbm b ON t.bbm_id=b.id WHERE t.pegawai_id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $pegawaiid);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Transaksi');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }




    public function insertTransaksi(Transaksi $transaksi)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "INSERT INTO transaksi (tanggal, modal, harga, banyak, potongan, total, subtotal, rating, member_id, cabang_id, bbm_id, pegawai_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $link->prepare($query);



        $tgl = date('Y-m-d H:i:s');

        $stmt->bindValue(1, $tgl);
        $stmt->bindValue(2, $transaksi->getModal());
        $stmt->bindValue(3, $transaksi->getHarga());
        $stmt->bindValue(4, $transaksi->getBanyak());
        $stmt->bindValue(5, $transaksi->getPotongan());
        $stmt->bindValue(6, $transaksi->getTotal());
        $stmt->bindValue(7, $transaksi->getSubtotal());
        $stmt->bindValue(8, $transaksi->getRating());
        $stmt->bindValue(9, $transaksi->getMemberId());
        $stmt->bindValue(10, $transaksi->getCabangId());
        $stmt->bindValue(11, $transaksi->getBbmId());
        $stmt->bindValue(12, $transaksi->getPegawaiId());




        $link->beginTransaction();
        if ($stmt->execute()) {
            $idTransaksi = $link->lastInsertId();
            $link->commit();
            $result = 1;




            // $query = "INSERT into poinmasuk (member_id, tanggal, status, jumlah, sisa,  transaksi_id) 
            //     VALUES (?, ?, ?, ?, ?, ?)";
            //bikin poin masuk



            if ($transaksi->getMemberId() != null) {
                $poinMasuk = new PoinMasuk();
                $poinMasuk->setMemberId($transaksi->getMemberId());
                $poinMasuk->setStatus(1);
                //hitung poin dpt brp
                $poin = 0;
                $bbmid = $transaksi->getBbmId();
                if ($bbmid == 1) {
                    $poin = round($transaksi->getBanyak() * 2);
                } else if ($bbmid == 2) {
                    $poin = round($transaksi->getBanyak() * 2.5);
                } else if ($bbmid == 3) {
                    $poin = round($transaksi->getBanyak() * 1);
                } else if ($bbmid == 4) {
                    $poin = round($transaksi->getBanyak() * 2);
                }

                $memberDao = new MemberDaoImpl();
                $selisihUltah = $memberDao->getSelisihUlangTahun($transaksi->getMemberId());
                if($selisihUltah['hari']!=null){
                    $poin = $poin * 2;
                }

                $poinMasuk->setJumlah($poin);
                $poinMasuk->setSisa($poin);
                $poinMasuk->setTransaksiId($idTransaksi);
                $poinMasukDao = new PoinMasukDaoImpl();
                $poinMasukDao->insertPoinMasuk($poinMasuk);

                //Kalau pakai potongan/poin
                //$query = "INSERT into poinkeluar (tanggal, jumlah, transaksi_id, member_id) VALUES (NOW(), ?, ?, ?)";
                $potongan = $transaksi->getPotongan();

                if ($potongan > 0) {
                    $poinKeluar = new PoinKeluar();
                    $jmlPoinKeluar = $potongan / 10000 * 150;
                    $poinKeluar->setMemberId($transaksi->getMemberId());
                    $poinKeluar->setJumlah($jmlPoinKeluar);
                    $poinKeluar->setTransaksiId($idTransaksi);
                    $poinKeluarDao = new PoinKeluarDaoImpl();
                    $poinKeluarDao->insertPoinKeluar($poinKeluar);
                    $poinMasukDao->pakaiPoin($transaksi->getMemberId(), $jmlPoinKeluar);
                }
                $poinMasukDao->updatePoin($transaksi->getMemberId());
            }
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function updateTrans(Transaksi $transaksi)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "UPDATE transaksi SET rating =? WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $transaksi->getRating());
        $stmt->bindValue(2, $transaksi->getId());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        echo "<script>window.location.href='index.php?navito=member'</script>";
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function getTransId($tp)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from transaksi WHERE member_id = ? AND rating IS NULL";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $tp);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Transaksi');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }


    /**
     * @param $cid
     * @return Transaksi
     */
    public function geTransidNi($cid)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM transaksi WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $cid);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Transaksi');
    }
}
