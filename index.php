<?php
  include 'koneksi.php';

  $query = "SELECT * FROM tb_sepatu;";
  $sql = mysqli_query($conn, $query);
  $no = 0;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <title>Sneakers Area</title>
</head>
<body>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      SneakersArea
    </a>
  </div>
</nav>
<!-- Judul -->
<div class="container">
  <h1 class="mt-4">Tabel Sepatu</h1>
<figure>
  <blockquote class="blockquote">
    <p>Berisi data sepatu yang telah disimpan.</p>
  </blockquote>
</figure>
<a href="kelola.php" type="button" class="btn btn-primary mb-3">
     Tambah Data
</a>
<div class="table-responsive">
  <table class="table align-middle table-bordered table-hover">
    <thead>
      <tr>
        <th><center>No.</center></th>
        <th>ID Sepatu</th>
        <th>Merk Sepatu</th>
        <th>Tipe</th>
        <th>Ukuran</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
        while($result = mysqli_fetch_assoc($sql)){
    ?>
      <tr>
        <td><center>
          <?php echo ++$no; ?>.
        </center></td>
        <td><?php echo $result['id']; ?></td>
        <td><?php echo $result['merk']; ?></td>
        <td><?php echo $result['tipe']; ?></td>
        <td><?php echo $result['ukuran']; ?></td>
        <td><center>
          <img src="img/<?php echo $result['foto']; ?>" style="width: 150px">
        </center></td>
        <td>
          <a href="kelola.php?ubah=<?php echo $result['no']; ?>" type="button" class="btn btn-success btn-sm">
         <i class="fa fa-pencil"></i>
        </a>
          <a href="proses.php?hapus=<?php echo $result['no']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anada ingin menghapus kolom ini?')">
          <i class="fa fa-trash"></i>
        </a>
        </td>
      </tr>
      <?php
          }
      ?>
    </tbody>
  </table>
</div>
   </div> 
</body>
</html>