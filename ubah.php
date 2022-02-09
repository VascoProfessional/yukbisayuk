<?php
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

//jika tidak ada id di url 
if (!isset($_GET['id'])) {
  header("Location:index.php");
  exit;
}

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");

// cek apakah tombol ubah sudah di tekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah!');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $m['id']; ?>">
    <ul>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" autofocus required value="<?= $m['nama']; ?>">
      </li>
      <li><label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" required value="<?= $m['nrp']; ?>">
      </li>
      <li><label for="email">Email :</label>
        <input type="text" name="email" id="email" required value="<?= $m['email']; ?>">
      </li>
      <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $m['jurusan']; ?>">
      </li>
      <li>
        <input type="hidden" name="gambar-lama" value="<?= $m['gambar']; ?>">
        <label for="gambar">Gambar :</label>
        <input type="file" name="gambar" id="gambar" class="gambar" onchange="previewImage()">
        <img src="img/<?= $m['gambar']; ?>" width="100" style="display: block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js" ></script>
</body>

</html>