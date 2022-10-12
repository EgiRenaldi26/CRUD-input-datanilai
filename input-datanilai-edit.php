<?php
      if ( isset($_GET["nis"]) ){
            $nis = $_GET["nis"];
            $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis'; ";
            include('./input-config.php');
            $query = mysqli_query($mysqli, $check_nis);
            $row = mysqli_fetch_array($query);
      }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="input-datanilai-edit.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class="form-control" value="<?php echo $row["nis"]; ?>" type="number" name="nis" placeholder="Ex. 12003102"/><br>

      <label for="nama_lengkap">Nama Lengkap :</label><br>
      <input class="form-control" value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama_lengkap" placeholder="Ex. Firdaus"/><br>

      <label for="jenis_kelamin">Jenis Kelamin :</label><br>
      <input class="form-control" value="<?php echo $row["jenis_kelamin"]; ?>" type="text" name="jenis_kelamin"/><br>

      <label for="kelas">kelas :</label><br>
      <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas"/><br>

      <label for="nilai_kehadiran">Nilai Kehadiran :</label><br>
      <input class="form-control" value="<?php echo $row["nilai_kehadiran"]; ?>" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56"/><br>

      <label for="nilai_tugas">Nilai Tugas :</label><br>
      <input class="form-control" value="<?php echo $row["nilai_tugas"]; ?>" type="number" name="nilai_tugas" placeholder="Ex. 80.56"/><br>

      <label for="nilai_pts">Nilai Pts :</label><br>
      <input class="form-control" value="<?php echo $row["nilai_pts"]; ?>" type="number" name="nilai_pts" placeholder="Ex. 80.56"/><br>

      <label for="nilai_pas">Nilai Pas :</label><br>
      <input class="form-control" value="<?php echo $row["nilai_pas"]; ?>" type="number" name="nilai_pas" placeholder="Ex. 80.56"/><br>
      <br>
      <input class="btn btn-sm btn-success" type="submit" name="simpan" value="Edit Data"/>
      <a class="btn btn-sm btn-secondary" href="input-datanilai.php">Kembali</a>
</form>

<?php
      if ( isset($_POST["simpan"]) ) {
            $nis = $_POST["nis"];
            $nama_lengkap = $_POST["nama_lengkap"];
            $jenis_kelamin= $_POST["jenis_kelamin"];
            $kelas = $_POST["kelas"];
            $nilai_kehadiran = $_POST["nilai_kehadiran"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $nilai_pts = $_POST["nilai_pts"];
            $nilai_pas = $_POST["nilai_pas"];

            // EDIT - Memperbaharui Data
            $query = "
                  UPDATE datanilai SET nama_lengkap = '$nama_lengkap', 
                  jenis_kelamin = '$jenis_kelamin',
                  kelas = '$kelas',
                  nilai_kehadiran = '$nilai_kehadiran',
                  nilai_tugas = '$nilai_tugas',
                  nilai_pts = '$nilai_pts',
                  nilai_pas = '$nilai_pas'
                  WHERE nis = '$nis';
            ";
            
            include ('./input-config.php');
            $update = mysqli_query($mysqli, $query);

            if($update){
                  echo "
                        <script>
                        alert('Data berhasil diperbaharui');
                        window.location='input-datanilai.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='input-datanilai-edit.php?nis=$nis';
                        </script>
                  ";
            }
      }
?>
