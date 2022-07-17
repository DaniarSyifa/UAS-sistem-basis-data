<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
	$nama = $_POST['nama_pasien'];


    $sql = 'UPDATE pasien SET ';
    $sql .= "nama_pasien = '{$nama}' " ;
    $sql .= "WHERE id_pasien = '{$id}'";
    $result = mysqli_query($con, $sql);
    header('location: pasien.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM pasien WHERE id_pasien = '{$id}'";
    $result = mysqli_query($con, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result);

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<title>Edit Pasien</title>
	<style>
	.irga {
		background-color: 	#DEB887;
		border-radius: 5px;
		padding: 10px 23px;
		margin-bottom: 20px;
	}
	form div > label {
			display: inline-block;
			width: 100px;
			height: 30px;
	}
	form div > label {
			display: inline-block;
			width: 100px;
			height: 50px;
	}
	form input[type="text"], form textarea {
			border: 1px solid;
	}
	
	.main{
		height: 100vh;
	}
	
	.tambah-box{
		width: 900px;
		height: 600px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<div class="main d-flex flex-column justify-content-center align-items-center">
		<div class="tambah-box p-5 shadow">
		<header class="irga">
		<h2 align="center" class="text-white">Edit Pasien</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="edit_pasien.php" enctype="multipart/form-data">
			<div class="input mb-3">
				<label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
				<input type="text" class="form-control" name="nama_pasien" value="<?php echo $data['nama_pasien'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_pasien'];?>" />
					<input class="btn btn-success" type="submit" name="submit" value="Simpan" />
					<a href="pasien.php" role="button"button type="button" class="btn btn-success">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>