<?php

include "connection.php";

$post_data = $_GET;

if($post_data != null) {
    $sql = "DELETE FROM produk WHERE id = {$post_data['q']}";

    if($connection->query($sql) == true) {
        echo "Record successfull...";
        header("Location: index.php");
    } else {
        echo "Error failed";
    }
}

$connection->close();