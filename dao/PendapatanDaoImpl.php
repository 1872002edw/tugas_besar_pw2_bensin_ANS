<?php


class PendapatanDaoImpl
{
    public function getPendapatanData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT t.tanggal, c.namacabang AS cabang, b.jenis, t.banyak, t.subtotal AS pemasukan, t.modal, t.potongan, (t.subtotal-t.modal) AS pendapatan
        FROM transaksi t JOIN bbm b ON t.bbm_id = b.id JOIN cabang c ON t.cabang_id = c.id ORDER BY t.tanggal DESC";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Pendapatan');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function getPendapatanDataWhereCabangBulanIs($idCabang, $bulan)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT t.tanggal, b.jenis, t.banyak, t.subtotal AS pemasukan, t.modal, t.potongan, (t.subtotal-t.modal) AS pendapatan
        FROM transaksi t JOIN bbm b ON t.bbm_id = b.id
        JOIN cabang c ON t.cabang_id = c.id
        WHERE t.cabang_id=? AND MONTH(t.tanggal) = ? ";
        $stmt = $link->query($query);
        $stmt->bindParam(1, $idCabang);
        $stmt->bindParam(2, $bulan);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Pendapatan');
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function getTotal()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT SUM(subtotal) AS pemasukan, SUM(modal) AS modal, SUM(potongan) AS potongan, SUM((subtotal-modal)) AS pendapatan
        FROM transaksi";
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Total');
    }

    public function getTotalWhereCabang($cabang)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT SUM(subtotal) AS pemasukan, SUM(modal) AS modal, SUM(potongan) AS potongan, SUM((subtotal-modal)) AS pendapatan
        FROM transaksi WHERE cabang_id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $cabang);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Total');
    }

    public function getTotalWhereBulan($bulan)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT SUM(subtotal) AS pemasukan, SUM(modal) AS modal, SUM(potongan) AS potongan, SUM((subtotal-modal)) AS pendapatan
        FROM transaksi WHERE MONTH(tanggal) = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $bulan);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Total');
    }

    public function getTotalWhereCabangBulan($cabang, $bulan)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT SUM(subtotal) AS pemasukan, SUM(modal) AS modal, SUM(potongan) AS potongan, SUM((subtotal-modal)) AS pendapatan
        FROM transaksi WHERE cabang_id = ? AND MONTH(tanggal) = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $cabang);
        $stmt->bindParam(2, $bulan);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Total');
    }
    
}