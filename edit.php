<?php

include "connection.php";

$post_data = $_POST;

if($post_data != null) {
    $sql = "UPDATE produk SET
        nama_produk = '{$post_data['nama_produk']}',
        keterangan = '{$post_data['keterangan']}',
        harga = {$post_data['harga']},
        jumlah = {$post_data['jumlah']}
        WHERE
        id = '{$post_data['id']}'
    ";

    if($connection->query($sql) == true) {
        echo "Record successfull...";
        header("Location: index.php");
    } else {
        echo "Error failed";
    }
}

$connection->close();