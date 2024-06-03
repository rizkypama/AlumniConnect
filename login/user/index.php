<?php
session_start();
include('../koneksi.php');

if ($_SESSION['status'] != "sudah_login") {
    header("location:../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
    header("location:../login.php");
    die;
}
$timeout = 60;

$timeout = $timeout * 60;
if (isset($_SESSION['start_session'])) {
    $elapsed_time = time() - $_SESSION['start_session'];
    if ($elapsed_time >= $timeout) {
        header("location:../logout.php");
    }
}
$_SESSION['start_session'] = time();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
    table,
    th,
    td {
        padding: 10px;
        text-align: center;
        border: 1px solid black;
        width: 1200px;
    }

    th {
        background-color: royalblue;
        color: white;
    }

    td {
        background-color: #c9c9c9;
        font-weight: bold;
    }

    html {
        scroll-behavior: smooth;
    }
    </style>
    <title>Dokumen Informasi Alumni</title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/album.css">
    <link rel="stylesheet" href="../admin/assets/vendors/fontawesome/css/all.min.css">
</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Author: Albet Novendo. Sistem Informasi Alumni</p>
                    </div>
                    <div class="col-sm-3 offset-md-1 py-4">
                        <h4 class="text-white">Menu</h4>
                        <ul class="list-unstyled">
                            <h6 class="text-white">Profile</h6>
                            <li><a href="profile/profile.php" class="text-white"><?php echo $_SESSION['nama']; ?></a>
                            </li>
                            <li><a href="../logout.php" class="text-white">Keluar</a></li>
                            <hr color="white">
                            <h6 class="text-white">Select Tables:</h6>
                            <li><a href="index.php" class="text-white">Kerja</a></li>
                            <li><a href="kuliah.php" class="text-white">Kuliah</a></li>
                            <li><a href="kerjakuliah.php" class="text-white">Kerja dan Kuliah</a></li>
                            <li><a href="mencrkrj.php" class="text-white">Mencari Kerja</a></li>
                            <li><a href="usaha.php" class="text-white">Usaha</a></li>
                            <li><a href="profile/createdata/search.php" class="text-white">Cari Data</a></li>
                            <hr color="white">
                            <h6 class="text-white">Discussion:</h6>
                            <li><a href="profile/discord.php" class="text-white">Discuss with Alumni</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mr-2">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                        </path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>Dokumentasi Informasi Alumni</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Selamat datang di Sistem Informasi Alumni</h1>
                <p class="lead text-muted">Menampilkan Data Alumni Dengan Status <strong>Kerja</strong></p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    $limit = 20;
                    $paging = isset($_GET['paging']) ? (int)$_GET['paging'] : 1;
                    $main_page = ($paging > 1) ? ($paging * $limit) - $limit : 0;

                    $previous = $paging - 1;
                    $next = $paging + 1;

                    $query = mysqli_query($koneksi, "SELECT * FROM kerja");
                    $totalquery = mysqli_num_rows($query);
                    $totalpaging = ceil($totalquery / $limit);

                    $querydata = mysqli_query($koneksi, "SELECT * FROM kerja ORDER BY id DESC limit $main_page, $limit");
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($querydata)) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <?php
                                if ($row['gambar'] != "") { ?>
                            <center>
                                <img class="card-img-top" style="width:200px;height:220px;"
                                    src="../admin/crud/gambar/<?php echo $row['gambar']; ?>" alt="Card image cap">
                            </center>
                            <?php } ?>
                            <div class="card-body">
                                <p class="card-text">Nama: <?php echo $row['nama']; ?></p>
                                <p class="card-text">Jenis Kelamin: <?php echo $row['jenis_kelamin']; ?></p>
                                <p class="card-text">Nama Perusahaan: <?php echo $row['nama_perusahaan']; ?></p>
                                <p class="card-text">Jabatan: <?php echo $row['jabatan']; ?></p>
                                <p class="card-text">Tahun Kerja: <?php echo $row['tahun_kerja']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <?php
                                            if ($row['gambar'] != "") { ?>
                                        <a type="button" href="../admin/crud/lihat.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-outline-primary">Lihat</a>
                                        <?php } ?>
                                        <button type="button" class="btn btn-sm btn-outline-danger dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Report
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="profile/createdata/kerja/reqedit.php?id=<?php echo $row['id']; ?>">Suggest
                                                Edit</a>
                                            <a class="dropdown-item" href="deleteitems.php?from=index.php">Request
                                                Delete Data</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php if (mysqli_num_rows($querydata) > 0) { ?>
            <ul class="pagination bgadjust justify-content-center">
                <li class="page-item bgadjust">
                    <a class="page-link bgadjust bgadjust-hover" <?php if ($paging > 1) {
                                                                            echo "href='?paging=$previous'";
                                                                        } ?>><i class="fas fa-backward"></i></a>
                </li>
                <?php
                    for ($x = 1; $x <= $totalpaging; $x++) {
                    ?>
                <li class="page-item bgadjust"><a class="page-link bgadjust bgadjust-hover"
                        href="?paging=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                    }
                    ?>
                <li class="page-item bgadjust">
                    <a class="page-link bgadjust bgadjust-hover" <?php if ($paging < $totalpaging) {
                                                                            echo "href='?paging=$next'";
                                                                        } ?>><i class="fas fa-forward"></i></a>
                </li>
            </ul>
            <?php } ?>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>&copy; 2020-Tak Terhingga | Albet Novendo</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
          ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="css/js/jquery.js"></script>
    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="css/js/popper.min.js"></script>
    <script src="css/js/bootstrap.min.js"></script>
    <script src="css/js/holder.min.js"></script>
</body>

</html>