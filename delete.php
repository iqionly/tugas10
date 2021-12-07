<?php

include "connection.php";

$post_data = $_GET;

if($post_data != null) {
    $sql = "DELETE FROM produk WHERE id = {$post_data['q']}";

    if($connection->query($sql) == true) {
        echo "Delete data successfull... <a href=\"index.php\">back</a>";
    } else {
        echo "Error failed";
    }
}

$connection->close();