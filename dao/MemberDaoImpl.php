<?php
class MemberDaoImpl
{
    public function getMemberData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT m.id, u.nama, u.email, m.tgllahir, m.poin, m.mobil, m.motor
                FROM member m JOIN user u ON m.id = u.member_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Member');
        PDOUtil::closeConnection($link);
        return $result;
    }

    /**
     * @param $mid
     * @return Member
     */
    public function getMemberIdIs($mid)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT id, tgllahir, poin, mobil, motor FROM member WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $mid);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Member');
    }

    public function getPoinIdIs($mid)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT id, tgllahir, poin, mobil, motor FROM member WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $mid);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        $member = $stmt->fetchObject('Member');
        $maxpoin = $member->getPoin();
        return $maxpoin;
    }

    public function insertMember(Member $member)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "INSERT into member (tgllahir, poin, mobil, motor) VALUES (?,0,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getTgllahir());
        $stmt->bindValue(2, $member->getMobil());
        $stmt->bindValue(3, $member->getMotor());
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

    public function updateMember(Member $member)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "UPDATE member SET tgllahir = ?, mobil =?, motor=? WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getTgllahir());
        $stmt->bindValue(2, $member->getMobil());
        $stmt->bindValue(3, $member->getMotor());
        $stmt->bindValue(4, $member->getId());
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

    public function getSelisihUlangTahun($memberId)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT DAY(NOW())-DAY(tgllahir) AS hari FROM member
        WHERE MONTH(NOW())-MONTH(tgllahir) = 0 AND DAY(NOW())-DAY(tgllahir) BETWEEN -3 AND 3 AND id = ?;";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $memberId);
        $stmt->execute();
        return $stmt->fetch();
    }
}