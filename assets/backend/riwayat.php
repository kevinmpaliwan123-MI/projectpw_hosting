<?php

include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM pesanan");

?>

<table border="1">

    <tr>

        <th>ID User</th>
        <th>Nama</th>
        <th>Game</th>
        <th>Rank Awal</th>
        <th>Rank Tujuan</th>
        <th>Harga</th>

    </tr>

    <?php while ($d = mysqli_fetch_array($data)) { ?>

        <tr>

            <td><?= $d['id_user'] ?></td>

            <td><?= $d['nama_user'] ?></td>

            <td><?= $d['game'] ?></td>

            <td><?= $d['rank_awal'] ?></td>

            <td><?= $d['rank_tujuan'] ?></td>

            <td>Rp <?= number_format($d['total_harga'], 0, ",", ".") ?></td>

        </tr>

    <?php } ?>

</table>