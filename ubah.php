<?php
include "config/db.php";

$id = $_GET["id"];
$query = mysqli_query($db, "SELECT * FROM santri WHERE id_santri = '$id'");
$data = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];

    $error = false;

    if (empty($nama)) {
        echo "<div>Maaf, nama tidak boleh kosong</div>";
        $error = true;
    }
    if (empty($alamat)) {
        echo "<div>Maaf, alamat tidak boleh kosong</div>";
        $error = true;
    }
    if ($error == false) {

        $query = mysqli_query($db, "UPDATE santri SET nama='$nama', alamat='$alamat' WHERE id_santri = '$id'");
        if ($query) {
            header("location:index.php");
        } else {
            echo "<div>Data gagal di upload!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Santri Qodr</title>
</head>

<body>
    <center>
        <h1>Ubah Santri Qodr</h1>
        <a href="index.php">Kembali ke Beranda</a>
        <br><br>
        <form action="" method="post">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <td>Nama :</td>
                    <td><input type="text" name="nama" value="<?= $data["nama"] ?>"></td>
                </tr>
                <tr>
                    <td>Alamat :</td>
                    <td><input type="text" name="alamat" value="<?= $data["alamat"] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Ubah</button></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>