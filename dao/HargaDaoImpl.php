<?php
class HargaDaoImpl{
    public function getHargaData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT id, tanggal, modal, jual, bbm_id FROM harga";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Harga');
        PDOUtil::closeConnection($link);
        return $result;
    }

    /**
     * @param $bbmid
     * @return Harga
     */
    public function getLatestHargaWhereBBMIdIs($bbmid)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT id, tanggal, modal, jual, bbm_id FROM harga WHERE bbm_id = ? ORDER BY tanggal DESC LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $bbmid);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Harga');
    }

    public function insertHarga(Harga $harga)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "INSERT into harga (tanggal, modal, jual, bbm_id) VALUES (NOW(),?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $harga->getModal());
        $stmt->bindValue(2, $harga->getJual());
        $stmt->bindValue(3, $harga->getBbmId());
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