<?php
require_once('../lib/database.php');

class MahasiswaController {
    private $db;

    public function __construct($database) {
        $this->db = $database->getDB();
    }

    public function getAllMahasiswa() {
        $result = $this->db->query("SELECT * FROM mahasiswa");
        $mahasiswa = [];

        while ($row = $result->fetch_assoc()) {
            $mahasiswa[] = $row;
        }

        return json_encode($mahasiswa);
    }

    public function getMahasiswa($id) {
        $result = $this->db->query("SELECT * FROM mahasiswa where id='".$id."'");
        $mahasiswa = [];

        while ($row = $result->fetch_assoc()) {
            $mahasiswa[] = $row;
        }

        return json_encode($mahasiswa);
    }


    public function createMahasiswa($nim, $nama, $jk, $prodi) {
        $sql = "INSERT INTO mahasiswa (nim, nama, jk, prodi) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $nim, $nama, $jk, $prodi);
        
        if ($stmt->execute()) {
            $result['id'] = $this->db->insert_id;
            return json_encode($result);
        } else {
            return json_encode(["error" => "Failed to insert record"]);
        }
    }

    public function updateMahasiswa($id, $nim, $nama, $jk, $prodi) {
        $sql = "UPDATE mahasiswa SET nim = ?, nama = ?, jk = ?, prodi = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssi", $nim, $nama, $jk, $prodi, $id);
        
        if ($stmt->execute()) {
            return json_encode(["message" => "Record updated successfully"]);
        } else {
            return json_encode(["error" => "Failed to update record"]);
        }
    }

    public function deleteMahasiswa($id) {
        $sql = "DELETE FROM mahasiswa WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return json_encode(["message" => "Record deleted successfully"]);
        } else {
            return json_encode(["error" => "Failed to delete record"]);
        }
    }
}

?>