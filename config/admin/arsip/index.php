
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taurenesia Villa</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    
</head>

<body>

    <h1 class="judul">Kelola Taurinesia Villa</h1>
    <div class="list-table center" style="overflow-x: auto;"> 
        <table > 
            <thead>
                <tr>
                    <th colspan="6" class="thead">
                        <h3 class="center">Data Villa</h3>
                    </th>
                    <th style="width: 20px;" colspan="2">
                        <a href="formulir.php" class="tambah">Tambah</a>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th nowrap>Nama Villa</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Harga Villa</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr> 
                
            </thead>
            
            <tbody>
                <?php
                require "config.php";
                $query = mysqli_query($db, "SELECT * FROM data_villa"); //099
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td nowrap><?=$row['nama_villa']?></td>
                        <td>
                            <img src="img/<?=$row['gambar_villa']?>" alt="" height="70">
                        </td>
                        <td><?=$row['deskripsi_villa']?></td>
                        <td><?=$row['harga_villa']?></td>
                        <td><?=$row['alamat_villa']?></td>
                        <td class="edit">
                            <a href="edit.php?id=<?=$row['id']?>">
                                <img src="sidebar/assets/edit.svg" alt="">
                            </a>
                        </td>
                        <td class="hapus">
                            <a href="hapus.php?id=<?=$row['id']?>">
                                <!-- <img src="sidebar/assets/delete.svg" alt=""> -->
                                <img src="sidebar/assets/trash.svg" alt="">
                            </a>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>