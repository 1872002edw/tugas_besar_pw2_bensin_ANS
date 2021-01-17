<?php

class PDOUtil
{
    public static function createConnection()
    {
        $link = new PDO("mysql:host=localhost; dbname=bensin", "root", "");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }

    public static function closeConnection($link)
    {
        if ($link != null) {
            $link = null;
        }
    }

    public static function getLatestInsertId()
    {
        $id = 0;
        $link = new PDO("mysql:host=localhost; dbname=bensin", "root", "");
        $link->lastInsertId();
        $link = null;
        return $id;
    }
}
