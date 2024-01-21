<?php
  require '../proses/panggil.php';
  $idGet = strip_tags($_GET['id']);
  $hasil = $proses->tampil_data_id('users','pengguna_id',$idGet);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Material Dashboard 2 by Creative Tim</title>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"
    />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>
    <!-- Material Icons -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
      rel="stylesheet"
    />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="../assets/css/material-dashboard.css?v=3.1.0"
      rel="stylesheet"
    />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script
      defer
      data-site="YOUR_DOMAIN_HERE"
      src="https://api.nepcha.com/js/nepcha-analytics.js"
    ></script>
  </head>

  <body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12"></div>
      </div>
    </div>
  <div id="notifikasi" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; padding: 50px; background-color: rgba(0,0,0,0);">
  <div class="alert alert-danger">
    <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
  </div>
  </div>
    <main class="main-content mt-0">
      <div
        class="page-header align-items-start min-vh-100"
        style="
          background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');
        "
      >
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
          <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
              <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div
                  class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                >
                  <div
                    class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1"
                  >
                    <h4
                      class="text-white font-weight-bolder text-center mt-2 mb-0"
                    >
                      Edit Pembelian
                    </h4>
                  </div>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="../proses/crud_pembelian.php?aksi=tambah" class="text-start">
                   <div class="d-flex flex-column">
                    <label class="form-label input-group input-group-outline" for="barang">Pilih barang:</label>
                        <select id="barang" name="barang" class="form-control input-group input-group-outline p-2 border rounded-2">
                            <?php
                                $hasil = $proses->tampil_data('barang');
                                foreach($hasil as $isi){
                            ?>
                                <option value='<?php echo $isi['barang_id']?>'><?php echo $isi['name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-column">
                        <label class="form-label input-group input-group-outline" for="supplier">Pilih supplier:</label>
                         <select id="supplier" name="supplier" class="form-control input-group input-group-outline p-2 border rounded-2">
                            <?php
                                $hasil = $proses->tampil_data('supplier');
                                foreach($hasil as $isi){
                            ?>
                                <option value='<?php echo $isi['supplier_id']?>'><?php echo $isi['name']?></option>
                            <?php
                                }
                            ?>
                         </select>
                    </div>
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">QTY</label>
                      <input name="qty" type="text" class="form-control" />
                    </div>
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Harga</label>
                      <input name="price" type="text" class="form-control" />
                    </div>
                    <input type="hidden" value="<?php echo strip_tags($_GET['id']); ?>" class="form-control" name="id_login" required>
                    <div class="text-center">
                      <button
                        type="submit"
                        class="btn bg-gradient-primary w-100 my-4 mb-2"
                      >
                       Edit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--   Core JS Files   -->
<script>
  <?php if(isset($_GET['get']) && $_GET['get'] == 'gagal'){ ?>
     $("#notifikasi").fadeIn('slow');// If 'get' parameter is 'gagal', show the notification
  <?php } ?>

  var logingagal = function(){
      $("#notifikasi").fadeOut('slow');
  };
  setTimeout(logingagal, 4000); // Set the timeout to hide the notification
</script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  </body>
</html>
