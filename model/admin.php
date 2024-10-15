<?php

class Admin
{
    public function getAdminByUsername($username)
    {
        require_once('connect.php');
        $stmt = $conn->prepare('SELECT * FROM admins WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}