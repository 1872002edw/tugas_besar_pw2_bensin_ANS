<?php

class CabangDaoImpl{
    public function getCabangData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT id, namacabang, gambarcabang from cabang";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Cabang');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function getCabangPg($pg)
    {
        $link = PDOUtil::createConnection();
        $query = " SELECT namacabang FROM cabang WHERE id =?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $cbg);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Cabang');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }


}