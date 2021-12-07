<?php

include "connection.php";

$post_data = $_POST;

if($post_data != null) {
    $sql = "INSERT INTO produk (  
        nama_produk,
        keterangan,
        harga,
        jumlah 
    ) VALUES (
        '{$post_data['nama_produk']}',
        '{$post_data['keterangan']}',
        {$post_data['harga']},
        {$post_data['jumlah']}
    )";

    if($connection->query($sql) == true) {
        echo "Record successfull...";
        header("Location: index.php");
    } else {
        echo "Error failed";
    }
}

$connection->close();