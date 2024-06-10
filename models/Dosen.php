<?php
include_once 'config/conn.php';

class Dosen {
    static function getDosen()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM dosen");
        $stmt->execute();
        $result = $stmt->get_result();
        $dosen = array();
        while ($row = $result->fetch_assoc()) {
            $dosen[] = $row;
        }
        $conn->close();
        return $dosen;
    }
    static function getDosenById($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM dosen WHERE id= ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}