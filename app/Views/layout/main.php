<?php
$appInfo = new \Config\AppInfo();
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? '' ?> | <?= esc($appInfo->rsName) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-size: 14px;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .topbar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 16px;
        }

        .menubar {
            background: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .menubar .nav-link {
            padding: 12px 18px;
            font-weight: 500;
        }

        .menubar .nav-link:hover {
            background: #0d6efd;
            color: white;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<!-- TOP BAR -->
<div class="topbar py-2">
    <div class="container-fluid">
        <div class="brand">
            <img src="<?= base_url($appInfo->logo) ?>" height="32">
            <?= esc($appInfo->rsName) ?>
        </div>
    </div>
</div>

<!-- MENU BAR -->
<nav class="navbar navbar-expand-lg menubar">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown">
                        <i class="bi bi-database"></i> Master Data
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('master/jenis-instansi') ?>">Jenis Instansi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/data-instansi') ?>">Data Instansi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/data-fakultas') ?>">Data Fakultas</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/ruangan') ?>">Ruangan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/tempat-tidur') ?>">Tempat Tidur</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/kegiatan') ?>">Kegiatan</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('diklat') ?>">
                        <i class="bi bi-clipboard-data"></i> Data Diklat
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown">
                        <i class="bi bi-journal-bookmark"></i> Pelatihan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('master/pelatihan_internal') ?>">Pelatihan Internal</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/pelatihan_eksternal') ?>">Pelatihan Eksternal</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown">
                        <i class="bi bi-file-earmark-text"></i> Laporan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('master/laporan_internal') ?>">Laporan Internal</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('master/laporan_eksternal') ?>">Laporan Eksternal</a></li>
                    </ul>
                </li>

            </ul>
        </div>
                            <?php if(session()->get('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                        </li>
                    <?php endif; ?>
    </div>
</nav>

<!-- CONTENT -->
<div class="container-fluid p-3">
    <?= $this->renderSection('content') ?>
</div>

<footer class="text-center py-3 mt-4" 
        style="background: #f8f9fa; border-top:1px solid #ddd;">
    
    <small>
        © <?= date('Y') ?> E-Diklat RS | 
        RSU PKU DELANGGU
    </small>

</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
