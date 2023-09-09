<?php
require_once('../lib/database.php');
require_once('../controllers/Mahasiswa.php');

$database = new Database();
$controller = new MahasiswaController($database);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    echo $controller->getAllMahasiswa();
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents('php://input'));
    echo $controller->createMahasiswa($data->nim, $data->nama, $data->jk, $data->prodi);
} elseif ($_SERVER['REQUEST_METHOD'] == "PUT") {
    $data = json_decode(file_get_contents('php://input'));
    echo $controller->updateMahasiswa($data->id, $data->nim, $data->nama, $data->jk, $data->prodi);
} elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $id = $_GET['id'];
    echo $controller->deleteMahasiswa($id);
}

$database->close();

?>