<?php

$game = $_POST['game'];
$id_user=$_POST['id_user'];
$nama_user=$_POST['nama_user'];
$rank_awal = $_POST['rank_awal'];
$rank_tujuan = $_POST['rank_tujuan'];

$urutan_rank = [];
$harga_segmen = [];



if ($game === 'Mobile-Legends') {
    $urutan_rank = ['Bronze', 'Epic', 'Legend', 'Mythic'];
    $harga_segmen = [50000, 75000, 100000];

} elseif ($game === 'PUBG') {
    $urutan_rank =  ['Bronze', 'Silver', 'Gold', 'Crown', 'Ace', 'Conqueror'];
    $harga_segmen = [50000, 75000, 100000, 125000, 150000];

} elseif ($game === "Free-Fire") {
    $urutan_rank = ['Bronze', 'Silver', 'Gold', 'Platinum', 'Diamond', 'Heroik', 'Master'];
    $harga_segmen = [50000, 75000, 100000, 125000, 150000, 175000];

} elseif ($game === "Honor-Of-Kings") {
    $urutan_rank = ['Bronze', 'Silver', 'Gold', 'Platinum', 'Diamond', 'Master', 'Grandmaster'];
    $harga_segmen = [50000, 75000, 100000, 125000, 150000, 175000];
}


$posisi_awal = array_search($rank_awal, $urutan_rank);
$posisi_tujuan = array_search($rank_tujuan, $urutan_rank);


$output = "";
$total = 0;


if ($posisi_tujuan <= $posisi_awal) {
    $output = "Error: rank tujuan harus lebih tinggi dari rank awal!";
} else {
     for ($i = $posisi_awal; $i < $posisi_tujuan; $i++) {
        $total += $harga_segmen[$i];
    } 
    
    
    $output .= "Total harga: Rp " . number_format($total, 0, ',', '.') . "<br><br>";

    include "koneksi.php";

    $query="INSERT INTO pesanan
    (id_user,nama_user,game,rank_awal,rank_tujuan,total_harga)

    VALUES
    ('$id_user',
    '$nama_user',
    '$game',
    '$rank_awal',
    '$rank_tujuan',
    '$total')";

    mysqli_query($conn,$query);
}
?>

<!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="section_design.css">
        <title>Status Pemesanan Joki</title>
    </head>
    <body>

        <section class="bg-image py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 payment-text-color">
                        
                        <div class="card p-4 card-custom instrument-serifs text-center">
                            <div class="card-body">
                                
                                <h3 class="title-nota mb-4 fw-bold">
                                    ORDER SUCCESS
                                </h3>
                                
                                <div class="status-box-text mb-4 p-4 rounded text-center">
                                    <?php echo "$output"; ?>
                                </div>

                                <h3 class="title-nota mb-4 fw-bold">
                                    PESANAN BERHASIL DISIMPAN
                                </h3>

                                <a href="../../index.html">Back-Home</a>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    </html>



