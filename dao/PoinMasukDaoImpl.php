<?php


class PoinMasukDaoImpl
{
    public function getPoinMasukData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from poinmasuk";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PoinMasuk');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function getPoinMasukid($pm)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from poinmasuk WHERE member_id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $pm);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PoinMasuk');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function insertPoinMasuk(PoinMasuk $poinmasuk)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT into poinmasuk (member_id, tanggal, status, jumlah, sisa,  transaksi_id) 
                VALUES (?, NOW(), ?, ?, ?, ?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $poinmasuk->getMemberId());
        $stmt->bindValue(2, $poinmasuk->getStatus());
        $stmt->bindValue(3, $poinmasuk->getJumlah());
        $stmt->bindValue(4, $poinmasuk->getSisa());
        $stmt->bindValue(5, $poinmasuk->getTransaksiId());
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

    public function updatePoin($memberId)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT SUM(sisa) AS totalpoin FROM poinmasuk WHERE status = 1 AND member_id = ? GROUP BY member_id";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $memberId);
        $stmt->execute();
        $row = $stmt->fetch();
        $totalpoin = $row['totalpoin'];

        $query1 = "UPDATE member SET poin = ? WHERE id = ? ";
        $stmt1 = $link->prepare($query1);
        $stmt1->bindParam(1, $totalpoin);
        $stmt1->bindParam(2, $memberId);

        $link->beginTransaction();
        if ($stmt1->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
    }


    public function pakaiPoin($memberId, $poin)
    {
        $link = PDOUtil::createConnection();
        //Untuk mengambil poin dengan masa berlaku yang terkecil
        $query = "SELECT * FROM poinmasuk WHERE member_id=? AND status=1 ORDER BY tanggal ASC";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $memberId);
        $stmt->execute();


        $poinHabisIds = array();
        $poinMasihSisaId = 0;
        $poinMasihSisaSisa = 0;

        while ($poin > 0 && $poinTerlama = $stmt->fetch()) {
            $idPoinTerlama = $poinTerlama['id'];
            $sisa = $poinTerlama['sisa'];
            //trigger_error("pointterlama:".$sisa);
            if ($poin >= $sisa) {
                $poin -= $sisa;
                array_push($poinHabisIds, $idPoinTerlama);
                //trigger_error("poin:" . $poin);
                //trigger_error("sisa:" . $sisa . ";idPoinMasuk:" . $idPoinTerlama);
            } else {
                $sisa = $sisa - $poin;
                $poinMasihSisaId =  $idPoinTerlama;
                $poinMasihSisaSisa = $sisa;
                trigger_error("SISA:" . $sisa . ";idPoinMasuk:" . $idPoinTerlama);
                $poin = 0;
            }
        }


        //update poin yang habis
        //Untuk mengurangi sisa dengan poin yg dipakai (kondisi semua poin terpakai, sisa jadi 0 status jadi 0)
        $bunchOfPoinHabis = implode(',', $poinHabisIds);
        //trigger_error("Id yang habis:" . $bunchOfPoinHabis);
        //trigger_error("Id yang sisa:" . $poinMasihSisaId . ";sisa poin:" . $poinMasihSisaSisa);
        //$link = PDOUtil::createConnection();
        $query1 = "UPDATE poinmasuk SET sisa = 0, status = 0 WHERE id IN ($bunchOfPoinHabis)";

        $stmt1 = $link->prepare($query1);
        //$stmt1->bindParam(1, $bunchOfPoinHabis);


        $link->beginTransaction();
        if ($stmt1->execute()) {
            $link->commit();
            //trigger_error("Update yg habis berhasil sebayak:" . $stmt1->rowCount());
        }
        //$link1->commit();


        //Update poin yg masih sisa
        //Untuk mengurangi sisa dengan poin yg dipakai
        //$link = PDOUtil::createConnection();
        $query2 = "UPDATE poinmasuk SET sisa = ? WHERE id = ?";
        $stmt2 = $link->prepare($query2);
        $stmt2->bindParam(1, $poinMasihSisaSisa);
        $stmt2->bindParam(2, $poinMasihSisaId);
        $link->beginTransaction();
        if ($stmt2->execute()) {
            $link->commit();
            //trigger_error("Update yg sisa berhasil" . $stmt1->rowCount());
        }


        PDOUtil::closeConnection($link);
        //PDOUtil::closeConnection($link1);
        //PDOUtil::closeConnection($link2);
    }


    public function getPoinMauHabis($memberId)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT SUM(sisa) AS poin, (365-DATEDIFF(NOW(),tanggal)) AS masaberlaku 
        FROM poinmasuk WHERE (365-DATEDIFF(NOW(),tanggal)) <= 3 AND member_id=?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $memberId);
        $stmt->execute();
        return $stmt->fetch();
    }
}