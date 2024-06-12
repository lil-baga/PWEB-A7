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

    static function getJadwal()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM sempro WHERE deleted_at IS NULL");
        $stmt->execute();
        $result = $stmt->get_result();
        $sempro = array();
        while ($row = $result->fetch_assoc()) {
            $sempro[] = $row;
        }
        return $sempro;
    }

    static function getRecord()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM sempro WHERE deleted_at IS NOT NULL");
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
        global $conn;
        $id = $data['id'];
        $link_zoom = $data['link_zoom'];
        $link_record = $data['link_record'];

        $file_name = $_FILES['proposal']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = 'proposal_skripsi' . $id .  '.' . $file_ext;
        $upload_dir = 'resources/pdf/';

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_path = $upload_dir . $new_file_name;
        $tmp_name = $_FILES['proposal']['tmp_name'];
        if (move_uploaded_file($tmp_name, $upload_path)) {
            $stmt = $conn->prepare("UPDATE sempro SET proposal = ?, link_zoom = ?, link_record = ? WHERE id = ?");
            $stmt->bind_param("sssi", $new_file_name, $link_zoom, $link_record, $id);
            $stmt->execute();
            $result = $stmt->affected_rows > 0 ? true : false;
            return $result;
        } else {
            return false;
        }
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