<?php

// $connection variables
include "connection.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!empty($_GET['q'])) {

        $sql = "SELECT * FROM produk WHERE id = {$_GET['q']}";

        $results = $connection->query($sql)->fetch_assoc();

        if($results == false) {
            echo "ERROR";
            exit();
        }
    ?>
    <form name="editData" method="post" action="edit.php">
        <input name="id" type="hidden" value="<?php echo $results['id']; ?>" />
        <table align="center">
            <tr>
                <th colspan="3">EDIT PRODUK</th>
            </tr>
            <tr>
                <td>nama produk</td>
                <td>:</td>
                <td>
                    <input name="nama_produk" type="text" value="<?php echo $results['nama_produk']; ?>" />
                </td>
            </tr>
            <tr>
                <td>keterangan</td>
                <td>:</td>
                <td>
                    <textarea name="keterangan">
                        <?php echo $results['keterangan']; ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>harga</td>
                <td>:</td>
                <td>
                    <input name="harga" type="number"  value="<?php echo $results['harga']; ?>" />
                </td>
            </tr>
            <tr>
                <td>jumlah</td>
                <td>:</td>
                <td>
                    <input name="jumlah" type="number" value="<?php echo $results['jumlah']; ?>" />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="EDIT" /> | <input type="reset" value="RESET" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    } else {
    ?>
    <form name="insertData" method="post" action="insert.php">
        <table align="center">
            <tr>
                <th colspan="3">INPUT PRODUK</th>
            </tr>
            <tr>
                <td>nama produk</td>
                <td>:</td>
                <td>
                    <input name="nama_produk" type="text" />
                </td>
            </tr>
            <tr>
                <td>keterangan</td>
                <td>:</td>
                <td>
                    <textarea name="keterangan"></textarea>
                </td>
            </tr>
            <tr>
                <td>harga</td>
                <td>:</td>
                <td>
                    <input name="harga" type="number" />
                </td>
            </tr>
            <tr>
                <td>jumlah</td>
                <td>:</td>
                <td>
                    <input name="jumlah" type="number" />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="INSERT">
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>

    <hr>

    <table border="1" align="center" cellpadding="7">
        <tr>
            <th colspan="6">LIST PRODUK | <a href="index.php">refresh</a></th>
        </tr>
        <tr>
            <td>ID</td>
            <td>Nama Produk</td>
            <td>Keterangan</td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Action</td>
        </tr>
        <?php
        $sql = "SELECT * FROM  produk";

        $results = $connection->query($sql);

        if($results == false) {
            echo "ERROR";
            exit();
        }

        foreach ($results as $key => $value) {
            echo "<tr>";
            foreach ($value as $k => $v) {
                echo "<td>{$v}</td>";
            }
            echo "<td><a href=\"index.php?q={$value['id']}\">EDIT</a> | <a href=\"delete.php?q={$value['id']}\">HAPUS</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php

$connection->close();

?>