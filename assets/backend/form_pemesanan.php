<?php
// Mengambil data game, ditambahkan isset agar tidak error jika link diklik langsung
$game_dipilih = isset($_GET['game']) ? $_GET['game'] : '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="section_design.css">
    <title>Form Pemesanan Joki</title>
</head>

<body>
    <section class="bgr-image py-5 ">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    
                    <!-- Card Container Form -->
                    <div class="card p-4 card-custom instrument-serifs">
                        <div class="card-body ">

                            
                            
                            
                            <div class="text-center mb-4">
                                <span class="badge-game shadow-sm">
                                    <span class="text-primary fw-bold"><?php switch ($game_dipilih) {
                                        case 'PUBG':
                                            echo "<img src='/PROJECTPW_HOSTING/assets/payment-logo/PUBG.png' alt='pubg' class='logo-name'> ";
                                            break;
                                             case 'MobileLegends':
                                            echo "<img src='/PROJECTPW_HOSTING/assets/payment-logo/MLBB.png' alt='mlbb' class='logo-name'> ";
                                            break;
                                            case 'Honor-Of-Kings':
                                            echo "<img src='/PROJECTPW_HOSTING/assets/payment-logo/HOK.png' alt='hok' class='logo-name'> ";
                                            break;
                                            case 'Free-Fire':
                                            echo "<img src='/PROJECTPW_HOSTING/assets/payment-logo/FF.png' alt='ff' class='logo-name'> ";
                                            break;
                                              } ?> 
                                    </span>
                                </span>
                            </div>

                            <form method="POST" action="simpan_pesanan.php">
                                
                                <!-- Input ID  -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-secondary">ID Player</label>
                                    <input type="text" name="id_user" class="form-control form-control-lg" placeholder="Masukkan ID Game Kamu" required>
                                </div>

                                <!-- Input Nama  -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-secondary">Nama User / Nickname</label>
                                    <input type="text" name="nama_user" class="form-control form-control-lg" placeholder="Masukkan Nickname" required>
                                </div>

                                <!-- Hidden data game -->
                                <input type="hidden" name="game" value="<?= htmlspecialchars($game_dipilih) ?>">
                                
                                <!-- Dropdown Rank Awal -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-secondary">Rank Awal</label>
                                    <select name="rank_awal" class="form-select form-control-lg" required>
                                        <option value="" disabled selected>-- Pilih Rank Awal --</option>
                                        <?php if ($game_dipilih === 'MobileLegends'): ?>
                                            <option value="Bronze">Bronze</option>
                                            <option value="Epic">Epic</option>
                                            <option value="Legend">Legend</option>
                                            <option value="Mythic">Mythic</option>
                                        <?php elseif ($game_dipilih === 'PUBG'): ?>
                                            <option value="Bronze">Bronze</option>
                                            <option value="Silver">Silver</option>
                                            <option value="Gold">Gold</option>
                                            <option value="Crown">Crown</option>
                                            <option value="Ace">Ace</option>
                                            <option value="Conqueror">Conqueror</option>
                                        <?php elseif ($game_dipilih === 'Honor-Of-Kings'): ?>
                                            <option value="Bronze">Bronze</option>
                                            <option value="Silver">Silver</option>
                                            <option value="Gold">Gold</option>
                                            <option value="Platinum">Platinum</option>
                                            <option value="Diamond">Diamond</option>
                                            <option value="Master">Master</option>
                                            <option value="Grandmaster">Grandmaster</option>
                                        <?php elseif ($game_dipilih === 'Free-Fire'): ?>
                                            <option value="Bronze">Bronze</option>
                                            <option value="Silver">Silver</option>
                                            <option value="Gold">Gold</option>
                                            <option value="Platinum">Platinum</option>
                                            <option value="Diamond">Diamond</option>
                                            <option value="Heroik">Heroik</option>
                                            <option value="Master">Master</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <!-- Dropdown Rank Tujuan -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-secondary">Rank Tujuan</label>
                                    <select name="rank_tujuan" class="form-select form-control-lg" required>
                                        <option value="" disabled selected>-- Pilih Rank Tujuan --</option>
                                        <?php if ($game_dipilih === 'MobileLegends'): ?>
                                            <option value="Epic">Epic</option>
                                            <option value="Legend">Legend</option>
                                            <option value="Mythic">Mythic</option>
                                        <?php elseif ($game_dipilih === 'PUBG'): ?>
                                            <option value="Gold">Gold</option>
                                            <option value="Crown">Crown</option>
                                            <option value="Ace">Ace</option>
                                            <option value="Conqueror">Conqueror</option>
                                        <?php elseif ($game_dipilih === 'Honor-Of-Kings'): ?>
                                            <option value="Gold">Gold</option>
                                            <option value="Platinum">Platinum</option>
                                            <option value="Diamond">Diamond</option>
                                            <option value="Master">Master</option>
                                            <option value="Grandmaster">Grandmaster</option>
                                        <?php elseif ($game_dipilih === 'Free-Fire'): ?>
                                            <option value="Gold">Gold</option>
                                            <option value="Platinum">Platinum</option>
                                            <option value="Diamond">Diamond</option>
                                            <option value="Heroik">Heroik</option>
                                            <option value="Master">Master</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                
                                <div class="d-grid button-image">
                                    <button type="submit" class="btn btn-order btn-sm py-2"> 
                                    <img src="/PROJECTPW_HOSTING/assets/payment-logo/order-now.png" alt="pay-logo" class="img-btn">
                                </button>
                                </div>

                            </form>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>

</body>
</html>