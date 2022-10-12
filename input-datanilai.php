<?php 
      include('./input-config.php');
      if ( $_SESSION ["login"] != TRUE){
            header ('location:login.php');
      }
      echo "<div class='container'>";
      echo "<strong>Selamat Datang,</strong> " . $_SESSION["username"] . "<br>";
      echo "<strong>Anda sebagai </strong>: " . $_SESSION["role"];
      echo "<hr>";
      echo "<a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
      echo "<hr>";
      echo "<a class='btn btn-sm btn-primary' href='input-datanilai-tambah.php'>Tambah Data</a>";
      echo " - <a class='btn btn-sm btn-warning' href='input-datanilai-pdf.php'>Cetak PDF</a>";
      echo "<hr>";
      // READ - Menampilkan data dari database
      $no = 1;
      $tabledata = "";
      $data = mysqli_query($mysqli, " SELECT * FROM datanilai ");
      while($row = mysqli_fetch_array($data)){
            $tabledata .= "
                  <tr>
                        <td>".$row["nis"]."</td>
                        <td>".$row["nama_lengkap"]."</td>
                        <td>".$row["jenis_kelamin"]."</td>
                        <td>".$row["kelas"]."</td>
                        <td>".$row["nilai_kehadiran"]."</td>
                        <td>".$row["nilai_tugas"]."</td>
                        <td>".$row["nilai_pts"]."</td>
                        <td>".$row["nilai_pas"]."</td>
                        <td>
                              <a class='btn btn-sm btn-success' href='input-datanilai-edit.php?nis=".$row["nis"]."'>Edit</a>
                              &nbsp;-&nbsp;
                              <a class='btn btn-sm btn-danger' href='input-datanilai-hapus.php?nis=".$row["nis"]."' 
                              onclick='return confirm(\"Yakin Deck ?\");'>Hapus</a>
                        </td>
                  </tr>
            ";
            $no++;
      }

      echo "
            <table class='table table-dark table-bordered table-striped'>
                  <tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>kelas</th>
                        <th>Nilai kehadiran</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai Pts</th>
                        <th>Nilai Pas</th>
                        <th>Aksi</th>
                  </tr>
                  $tabledata
            </table>
      ";
      echo "</div>";
?>