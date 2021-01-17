<?php

class UserDaoImpl{
    /**
     * @param $username, $password
     * @return User
     */
    public function login($username, $password) {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('User');
    }

    /**
     * @param $userid
     * @return User
     */
    public function getUserWhereIdIs($userid) {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$userid);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('User');
    }

    public function cekUsernameEmail($username, $email) {
        $link = PDOUtil::createConnection();
        $query = "SELECT username, email FROM user WHERE username=? AND email=?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$email);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('User');
    }

    public function signUp(User $user, Member $member){
        $result = 0;
        $link = PDOUtil::createConnection();

        $queryMember = "INSERT into member (tgllahir, poin, mobil, motor) VALUES (?,0,null,null)";
        $stmtMember = $link->prepare($queryMember);
        $stmtMember->bindValue(1, $member->getTgllahir());
        $link->beginTransaction();
        if ($stmtMember->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        $query = "INSERT into user (nama, username, password, role, email,  member_id, pegawai_id) 
                VALUES (?, ?, ?, ?, ?, LAST_INSERT_ID(), ?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getNama());
        $stmt->bindValue(2, $user->getUsername());
        $stmt->bindValue(3, $user->getPassword());
        $stmt->bindValue(4, $user->getRole());
        $stmt->bindValue(5, $user->getEmail());
        $stmt->bindValue(6, $user->getPegawaiId());
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

    public function getUserPeg($upg)
    {
        $link = PDOUtil::createConnection();
        $query = " SELECT u.id, u.nama, c.namacabang, u.email
                FROM pegawai p JOIN user u ON p.id = u.pegawai_id
                JOIN cabang c ON c.id = p.cabang_id
                WHERE p.cabang_id =?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $upg);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'User');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function updateUser(User $user)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = "UPDATE user SET nama = ?, email =? WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getNama());
        $stmt->bindValue(2, $user->getEmail());
        $stmt->bindValue(3, $user->getId());
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

    public function cekupdate($cek)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT u.nama, u.username, u.email, c.namacabang
                FROM pegawai p JOIN user u ON p.id = u.pegawai_id
                JOIN cabang c ON c.id = p.cabang_id
                WHERE u.id =?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $upg);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'User');
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt;
    }

    public function upduspeg(User $user)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE user SET nama = ?, username =?, email =? WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getNama());
        $stmt->bindValue(2, $user->getUsername());
        $stmt->bindValue(3, $user->getEmail());
        $stmt->bindValue(4, $user->getId());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        echo "<script>window.location.href='index.php?navito=eom'</script>";
        PDOUtil::closeConnection($link);
        return $result;
    }
}