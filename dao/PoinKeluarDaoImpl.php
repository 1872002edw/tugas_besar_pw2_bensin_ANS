<?php


class PoinKeluarDaoImpl
{
    public function getPoinKeluarData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from poinkeluar";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'PoinKeluar');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function getPoinKeluarid($pk)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from poinkeluar WHERE member_id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $pk);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'PoinKeluar');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function insertPoinKeluar(PoinKeluar $poinkeluar)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into poinkeluar (tanggal, jumlah, transaksi_id, member_id) VALUES (?, ?, ?, ?)";
        $stmt = $link->prepare($query);

        $tgl = date('Y-m-d H:i:s');

        $stmt->bindValue(1, $tgl);
        $stmt->bindValue(2, $poinkeluar->getJumlah());
        $stmt->bindValue(3, $poinkeluar->getTransaksiId());
        $stmt->bindValue(4, $poinkeluar->getMemberId());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }
}