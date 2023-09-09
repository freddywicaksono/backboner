<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Entry</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Mahasiswa Entry</h1>
        <div class="row">
            <div class="col-md-4">
                <!-- Add a form for entering data -->
                <form id="mahasiswa-form">
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin:</label>
                        <select id="jk" name="jk" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <select id="prodi" name="prodi" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <option value="IND">Teknik Industri</option>
                            <option value="TIF-D3">Teknik Informatika D3</option>
                            <option value="TIF">Teknik Informatika S1</option>
                            <option value="PET">Peternakan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-8">
                <!-- Data table will be populated here using Backbone.js -->
                <table id="mahasiswa-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated here using Backbone.js -->
                    </tbody>
                </table>
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