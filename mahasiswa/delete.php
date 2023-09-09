<?php
require_once('../lib/database.php');
require_once('../controllers/Mahasiswa.php');

$database = new Database();
$controller = new MahasiswaController($database);

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $data = json_decode(file_get_contents('php://input'));
    $result = $controller->deleteMahasiswa($data->id);
    $database->close();
    
    // Check the number of affected records
    if ($result === false) {
        echo json_encode(["error" => "Failed to delete record"]);
    } elseif ($result === 0) {
        echo json_encode(["error" => "No records were deleted"]);
    } else {
        // The update was successful, so redirect to index.html
        echo json_encode(["error" => "No records were deleted"]);
        //header('Location: index.html');
        //exit; // Ensure no further code execution after the redirect
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$database->close();
?>
