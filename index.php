<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Santri Qodr - Website</title>
</head>

<body>
    <center>
        <h1>Santri Qodr</h1>
        <a href="tambah.php">Tambah Santri</a>
        </br></br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
            <?php
            include "config/db.php";
            $query = mysqli_query($db, "SELECT * FROM santri ORDER BY id_santri DESC ");
            $i = 1;
            while ($data = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data["nama"]; ?></td>
                    <td><?= $data["alamat"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $data["id_santri"] ?>">Ubah</a> |
                        <a onclick="return confirm('Yakin?')" href=" hapus.php?id=<?= $data["id_santri"]; ?>">Hapus</a>
                    </td>
                </tr>
                <?php $i++;
            endwhile; ?>
        </table>
    </center>
</body>

</html>