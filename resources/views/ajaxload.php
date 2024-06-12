<?php
include "resources/views/ajaxconn.php";

global $conn;
$stmt = $conn->prepare("SELECT * FROM sempro WHERE deleted_at IS NOT NULL");
$stmt->execute();
$result = $stmt->get_result();
$sempro = array();
while ($row = $result->fetch_assoc()) {
    $sempro[] = $row;
    echo $row['nama'];
}
?>