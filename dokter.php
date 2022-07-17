

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css" />
    <title>Menampilkan data dari database</title>
    <style>
        .hero {
            background-color: #0a516b;
            border-radius: 5px;
            padding: 10px 23px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container shadow p-3">
    <header>
    <h2 align="center" class="hero text-white">Tabel Dokter</h2>
    </header>
    <hr>
    <div class="btn-toolbar mb-2 mb-md-10">
        <a class="btn btn-primary me-3" href="home.php" role="button">Kembali</a>
        <a class="btn btn-primary " href="tambah_dokter.php" role="button S">Tambah</a>
    </div> 
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
    
             <tr>
                <td>No</td>
                <td>Id Dokter</td>
                <td>Nama Dokter</td>               
                <td>Aksi</td> 

            </tr>
        </thead>
        <?php
        include "koneksi.php";
        $no = 1;
        $query = mysqli_query($con, 'SELECT * FROM dokter');
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['id_dokter'] ?></td>
                <td><?php echo $data['nama_dokter'] ?></td>
                 <td><a class="btn btn-success" href="edit_dokter.php?id=<?= $data['id_dokter'];?>" role="button">Edit</a>
                    <a class="btn btn-danger" href="hapus_dokter.php?id=<?= $data['id_dokter'];?>" role="button">Hapus</a>
            </tr>
        <?php } ?>
    </table>
    <body>
