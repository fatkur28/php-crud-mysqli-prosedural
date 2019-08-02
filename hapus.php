<?php
include "config/db.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = mysqli_query($db, "DELETE FROM santri WHERE id_santri='$id'");
    if ($query) {
        header("location:index.php");
    } else {
        echo "<div>Data gagal di hapus!</div>";
    }
}
