<?php


class BBMDaoImpl
{
    public function getBBMData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * from bbm";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Bbm');
        PDOUtil::closeConnection($link);
        return $result;
    }

}