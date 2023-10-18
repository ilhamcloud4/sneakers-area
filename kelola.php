<!DOCTYPE html>

<?php
  include 'koneksi.php';

     $id = '';
     $merk = '';
     $tipe = '';
     $ukuran = '';

  if(isset($_GET['ubah'])){
     $no = $_GET['ubah'];
     $query = "SELECT * FROM tb_sepatu WHERE no = '$no';";
     $sql = mysqli_query($conn, $query);

     $result = mysqli_fetch_assoc($sql);

     $id = $result['id'];
     $merk = $result['merk'];
     $tipe = $result['tipe'];
     $ukuran = $result['ukuran'];

     //var_dump($result);
     //die();
  }
?>

<html>
<head>
  <meta charset="utf-8">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font awesome/css/font-awesome.min.css">

  <title>Sneakers Area</title>
</head>
<body>
  <nav class="navbar navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      SneakersArea
    </a>
  </div>
</nav>
<div class="container">
  <form method="POST" action="proses.php" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $no; ?>" name="no">
    <div class="mb-3 row">
    <label for="id" class="col-sm-2 col-form-label">ID Sepatu</label>
    <div class="col-sm-10">
      <input required type="text" name="id" class="form-control" id="id" placeholder="Ex: 1000 " value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="merk" class="col-sm-2 col-form-label">Merk Sepatu</label>
    <div class="col-sm-10">
      <input required type="text" name="merk" class="form-control" id="merk" placeholder="Ex: Converse" value="<?php echo $merk; ?>">
    </div>
  </div>
    <div class="mb-3 row">
    <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
    <div class="col-sm-10">
      <input required type="text" name="tipe" class="form-control" id="tipe" placeholder="Ex: Chuck Taylor 70's Low " value="<?php echo $tipe; ?>">
    </div>
  </div>
    <div class="mb-3 row">
    <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
    <div class="col-sm-10">
      <input required type="text" name="ukuran" class="form-control" id="ukuran" placeholder="Ex: 40,41 " value="<?php echo $ukuran; ?>">
    </div>
    
  <div class="mb-3 row">
   <label for="foto" class="col-sm-2 col-form-label">Foto</label>
   <div class="col-sm-10">
   <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
   </div>
  </div>

  </div>

  <div class="mb-3 row mt-4">
    <div class="col">
      <?php
          if(isset($_GET['ubah'])){
      ?>
       <button type="submit" name="aksi" value="edit" class="btn btn-primary">
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
         Simpan Perubahan
       </button>
       <?php
           } else {
       ?>
           <button type="submit" name="aksi" value="add" class="btn btn-primary">
        <i class="fa fa-floppy-o" aria-hidden="true"></i>
         Tambahkan
       </button>
        <?php
           }
       ?>
       <a href="index.php" type="button" class="btn btn-danger">
        <i class="fa fa-reply" aria-hidden="true"></i>
         Batal
       </a>
    </div>
  </form>
       
  </div>

</div>
</body>
</html>