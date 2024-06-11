<?php
include_once 'config/conn.php';

class Sempro {
    static function getSempro()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM sempro");
        $stmt->execute();
        $result = $stmt->get_result();
        $sempro = array();
        while ($row = $result->fetch_assoc()) {
            $sempro[] = $row;
        }
        return $sempro;
    }

    static function addSempro($data=[])
    {
        $nama = $data['nama'];
        $nim = $data['nim'];
        $judul = $data['judul'];
        $tanggal = $data['tanggal'];
        $pembahas1_id = $data['pembahas1_id'];
        $pembahas2_id = $data['pembahas2_id'];
        $pembimbing1_id = $data['pembimbing1_id'];
        $pembimbing2_id = $data['pembimbing2_id'];
        $users_id = $_SESSION['user']['id'];

        global $conn;
        $stmt = $conn->prepare("INSERT INTO sempro (nama, nim, judul, tanggal, pembahas1_id, pembahas2_id, pembimbing1_id, pembimbing2_id, users_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiiiii", $nama, $nim, $judul, $tanggal, $pembahas1_id, $pembahas2_id, $pembimbing1_id, $pembimbing2_id, $users_id);
        $stmt->execute();
        return $conn->insert_id;
    }

    static function addLink($data=[])
    {
        $id = $data['id'];
        $link_proposal = $data['link_proposal'];
        $link_zoom = $data['link_zoom'];
        $link_record = $data['link_record'];

        global $conn;
        $stmt = $conn->prepare("UPDATE sempro SET link_proposal = ?, link_zoom = ?, link_record = ? WHERE id = ?");
        $stmt->bind_param("sssi", $link_proposal, $link_zoom, $link_record, $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function updateSempro($data=[])
    {
        $id = $data['id'];
        $nama = $data['nama'];
        $nim = $data['nim'];
        $judul = $data['judul'];
        $tanggal = $data['tanggal'];
        $pembahas1_id = $data['pembahas1_id'];
        $pembahas2_id = $data['pembahas2_id'];
        $pembimbing1_id = $data['pembimbing1_id'];
        $pembimbing2_id = $data['pembimbing2_id'];

        global $conn;
        $stmt = $conn->prepare("UPDATE sempro SET nama = ?, nim = ?, judul = ?, tanggal = ?, pembahas1_id = ?, pembahas2_id = ?, pembimbing1_id = ?, pembimbing2_id = ? WHERE id = ?");
        $stmt->bind_param("ssssiiiii", $nama, $nim, $judul, $tanggal, $pembahas1_id, $pembahas2_id, $pembimbing1_id, $pembimbing2_id, $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function delete($id='')
    {
        global $conn;
        $deleted_at = date('Y-m-d H:i:s', strtotime('now'));
        if ($id == '') {
            $sql = "UPDATE sempro SET deleted_at = '$deleted_at'";
            $result = $conn->query($sql);
        }
        else {
            $sql = "UPDATE sempro SET deleted_at = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $deleted_at, $id);
            $stmt->execute();
            $result = $stmt->affected_rows > 0 ? true : false;
        }
        return $result;
    }
}