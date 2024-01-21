<?php
  require '../proses/panggil.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Toko Online</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/pengguna.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">List Pengguna</span>
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/pelanggan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">List Pelanggan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/barang.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">List Barang</span>
          </a>
        </li>
                <li class="nav-item">
          <a class="nav-link text-white" href="../pages/hak.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </div>
            <span class="nav-link-text ms-1">List Hak Akses</span>
          </a>
        </li>
                <li class="nav-item">
          <a class="nav-link text-white" href="../pages/pasokan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">List Pasokan</span>
          </a>
        </li>
                <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/pembelian.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </div>
            <span class="nav-link-text ms-1">List Pembelian</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/penjualan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-bandcamp"></i>
            </div>
            <span class="nav-link-text ms-1">List Penjualan</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-white" href="../pages/supplier.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-bell cursor-pointer"></i>
            </div>
            <span class="nav-link-text ms-1">List Supplier</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">List Pembelian</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">List Pembelian</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="../pages/add-pembelian.php">Tambah Pembelian</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pembelian</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Supplier</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">QTY</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price per Item</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no=1;
                     $hasil = $proses->tampil_data('pembelian_barang');
                     foreach($hasil as $isi){
                      ?>
                      <tr>
                        <td>
                           <div class="d-flex px-3 py-1">
                            <div class="d-flex flex-column justify-content-center">
                             <h6 class="mb-0 text-sm"> 
                                <?php 
                                  $hasil = $proses->join_data('pembelian_barang', 'barang', 'barang_id', $isi['barang_id']);
                                  echo $hasil['name'];
                                ?>
                                </h6>
                            </div>
                          </div>
                        </td>
                         <td>
                           <div class="d-flex px-3 py-1">
                            <div class="d-flex flex-column justify-content-center">
                             <h6 class="mb-0 text-sm"> 
                                <?php 
                                  $hasil = $proses->join_data('pembelian_barang', 'supplier', 'supplier_id', $isi['supplier_id']);
                                  echo $hasil['name'];
                                ?>
                                </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0"><?php echo $isi['quantity']?></p>
                        </td>
                         <td>
                          <p class="text-xs font-weight-bold mb-0"><?php echo 'Rp '. $isi['price_per_item']?></p>
                        </td>
                        <td>
                          <div class="d-flex flex-row justify-content-center gap-2">
                            <a href="../pages/edit-pembelian.php?id=<?php echo $isi['pembelian_id'];?>" class="btn bg-gradient-warning">
                            <span class="fa fa-edit"></span></a>
                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../proses/crud_pembelian.php?aksi=hapus&hapusid=<?php echo $isi['pembelian_id'];?>" 
                             class="btn bg-gradient-primary active btn-md">
                             <span class="fa fa-trash">
                             </span>
                            </a>                          
                          </div>
                        </td>
                      </tr>
                      <?php
                      $no++;
                    }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>