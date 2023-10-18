<?php
    include 'koneksi.php';

	if(isset($_POST['aksi'])){
		if($_POST['aksi'] == "add"){


			$id = $_POST['id'];
			$merk = $_POST['merk'];
			$tipe = $_POST['tipe'];
			$ukuran = $_POST['ukuran'];
			$foto = $_FILES['foto']['name'];

			$dir = "img/";
			$tmpFile = $_FILES['foto']['tmp_name'];

			move_uploaded_file($tmpFile, $dir.$foto);

			//die();

			$query = "INSERT INTO tb_sepatu VALUES(null, '$id', '$merk', '$tipe', '$ukuran', '$foto')";
			$sql = mysqli_query($conn, $query);

			if($sql){
				header("location: index.php");
				//echo "Data Berhasil <a href='index.php'>[Home]</a>";
			} else{
				echo $query;
			}

			//echo $id." / ".$merk." / ".$tipe." / ".$ukuran." / ".$foto;

			//echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
		} else if($_POST['aksi'] == "edit"){
			//echo "Edit Data <a href='index.php'>[Home]</a>";
			//var_dump($_POST);

			$no = $_POST['no'];
			$id = $_POST['id'];
			$merk = $_POST['merk'];
			$tipe = $_POST['tipe'];
			$ukuran = $_POST['ukuran'];

			$queryShow = "SELECT * FROM tb_sepatu WHERE no = $no";
		    $sqlShow = mysqli_query($conn, $queryShow);
		    $result = mysqli_fetch_assoc($sqlShow);

		    if($_FILES['foto'] ['name'] == ""){
                $foto = $result['foto'];
		    } else {
		    	$foto = $_FILES['foto'] ['name'];
		    	unlink("img/".$result['foto']);
		    	move_uploaded_file($_FILES['foto'] ['tmp_name'], 'img/'.$_FILES['foto'] ['name']);

		    }


			$query = "UPDATE tb_sepatu SET id='$id', merk='$merk', tipe='$tipe', ukuran='$ukuran', foto='$foto' WHERE no='$no';";
			$sql = mysqli_query($conn, $query);
			header("location: index.php");
		


		}

	}

	if(isset($_GET['hapus'])){
		$no = $_GET['hapus'];

		$queryShow = "SELECT * FROM tb_sepatu WHERE no = $no";
		$sqlShow = mysqli_query($conn, $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

        //var_dump($result);

        unlink("img/".$result['foto']);

		$query = "DELETE FROM tb_sepatu WHERE  no = '$no';";
		$sql = mysqli_query($conn, $query);

		if($sql){
				header("location: index.php");
				//echo "Data Berhasil <a href='index.php'>[Home]</a>";
			} else{
				echo $query;
			}

		//echo "Hapus Data <a href='index.php'>[Home]</a>";
	}
?>