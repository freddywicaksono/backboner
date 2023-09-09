<?php
require_once('../lib/database.php');
require_once('../controllers/Mahasiswa.php');

$database = new Database();
$controller = new MahasiswaController($database);

$id = isset($_GET['id']) ? $_GET['id'] : null;
$result = $controller->getMahasiswa($id);

if ($result) {
    $mahasiswaData = json_decode($result, true);

    // Check if the keys exist in the data before accessing them
    $id = isset($mahasiswaData[0]['id']) ? $mahasiswaData[0]['id'] : '';
    $nim = isset($mahasiswaData[0]['nim']) ? $mahasiswaData[0]['nim'] : '';
    $nama = isset($mahasiswaData[0]['nama']) ? $mahasiswaData[0]['nama'] : '';
    $jk = isset($mahasiswaData[0]['jk']) ? $mahasiswaData[0]['jk'] : '';
    $prodi = isset($mahasiswaData[0]['prodi']) ? $mahasiswaData[0]['prodi'] : '';
} else {
    // Handle the case when no data is found or an error occurs
    echo "No data found or an error occurred.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Mahasiswa</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Edit form -->
                <form id="mahasiswa-edit-form" method="PUT">
                <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" required value="<?php echo $nim; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $nama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="jk" name="jk" required value="<?php echo $jk; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" required value="<?php echo $prodi; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" id="update-button">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Backbone.js libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js"></script>

    <!-- Include your app.js script -->
    <script src="../model/mahasiswa.js"></script>
</body>
</html>
