<?php


class PegawaiDaoImpl
{
    public function getPegawaiData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from pegawai";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Pegawai');
        PDOUtil::closeConnection($link);
        return $result;
    }

    /**
     * @param $pegawaiId
     * @return Pegawai
     */
    public function getPegawaiWhereIdIs($pegawaiId)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from pegawai WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $pegawaiId);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Pegawai');
    }

    public function getPegawaiCbg($cbg)
    {
        $link = PDOUtil::createConnection();
        $query = " SELECT u.id, u.nama
                FROM pegawai p JOIN user u ON p.id = u.pegawai_id
                WHERE p.cabang_id =?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $cbg);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Pegawai');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function getUserPegTrans($upg)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT u.nama, t.tanggal, COUNT(t.banyak) AS banyak, c.namacabang, sum(t.rating) AS rating
                FROM pegawai p JOIN transaksi t ON p.id = t.pegawai_id
                JOIN user u ON p.id = u.pegawai_id
                JOIN cabang c ON c.id = p.cabang_id
                WHERE p.cabang_id =?
                GROUP BY u.nama
                ORDER BY rating desc";

        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $upg);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Pegawai');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function insertPegawai(pegawai $pegawai)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into peawai (cabang_id) VALUES (?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $pegawai->getCabangId());
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

    public function updpeg(Pegawai $pegawai)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query2 = "UPDATE pegawai SET cabang_id = ? 
                    WHERE id = ?";
        $stmt2 = $link->prepare($query2);
        $stmt2->bindValue(1, $pegawai->getCabangId());
        $stmt2->bindValue(2, $pegawai->getId());

        $link->beginTransaction();
        if ($stmt2->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        echo "<script>window.location.href='index.php?navito=eom'</script>";
        PDOUtil::closeConnection($link);
        return $result;
    }

    /**
     * @param $userid
     * @return User
     */
    public function setiidcobs($pegawaiId)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT p.id
                FROM pegawai p JOIN user u ON p.id = u.pegawai_id
                WHERE u.id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $pegawaiId);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Pegawai');
    }
}