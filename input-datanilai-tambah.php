<div class="container">
<h1>Tambah Data</h1>
<form action="input-datanilai-tambah.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class="form-control" type="number" name="nis" placeholder="Ex. 12003102" /><br>

      <label for="nama">Nama Lengkap :</label><br>
      <input class="form-control" type="text" name="nama" placeholder="Ex. Egi" /><br>

      <label for="tanggal_lahir">Jenis Kelamin :</label><br>
      <input class="form-control" type="text" name="jenis_kelamin" /><br>

      <label for="nilai">Kelas :</label><br>
      <input class="form-control" type="text" name="kelas" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai Kehadiran :</label><br>
      <input class="form-control" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai Tugas :</label><br>
      <input class="form-control" type="number" name="nilai_tugas" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai PTS :</label><br>
      <input class="form-control" type="number" name="nilai_pts" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai PAS :</label><br>
      <input class="form-control" type="number" name="nilai_pas" placeholder="Ex. 80.56" /><br>
      <br>
      <input class="btn btn-sm btn-success" type="submit" name="simpan" value="Simpan Data" />
      <a class="btn btn-sm btn-secondary" href="input-datanilai.php">Kembali</a>
</form>

<?php
      include ('./input-config.php');
      if( $_SESSION["login"] !=TRUE) {
            header('location:login.php');
      }
      if( $_SESSION["role"] !="admin") {
            echo "
                  <script>
                        alert('Akses tidak diberikan, kamu bukan admin');
                        window.location='input-datanilai.php';
                  </script>
                  ";
      }

      if( isset($_POST["simpan"]) ){
            $nis = $_POST["nis"];
            $nama = $_POST["nama"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $kelas = $_POST["kelas"];
            $nilai_kehadiran = $_POST["nilai_kehadiran"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $nilai_pts = $_POST["nilai_pts"];
            $nilai_pas = $_POST["nilai_pas"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO datanilai VALUES
                  ('$nis', '$nama', '$jenis_kelamin', '$kelas' , '$nilai_kehadiran' , '$nilai_tugas' , '$nilai_pts' , '$nilai_pas');
            ";

           
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='input-datanilai.php';
                        </script>
                  ";
            }

      }
?>