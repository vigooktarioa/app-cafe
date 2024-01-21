<?php
    require 'panggil.php';
    // proses edit
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'edit_detail') {
        try {
            $quantity = strip_tags($_POST['qty']);
            $barang_id = strip_tags($_POST['barang']);
            $id = strip_tags($_POST['id']);

            $tabel = 'detail_transaksi';
            $where = 'detail_id';

            $data = array(
                'quantity' => $quantity,
                'barang_id' => $barang_id,
            );

            $updateResult = $proses->edit_data($tabel, $data, $where, $id);
            $hasil = $proses->tampil_data_id($tabel, $where, $id);
            $transaksi_id = $hasil['transaksi_id'];
            echo '<script>alert("Edit Data Berhasil");window.location="../pages/detail-transaksi.php?id=' . $transaksi_id . '";</script>';
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/penjualan.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'edit') {
    try {
        if (!empty($_POST['pelanggan']) && !empty($_POST['pengguna'])) {
            $pelanggan_id = strip_tags($_POST['pelanggan']);
            $pengguna_id = strip_tags($_POST['pengguna']);
            $id = strip_tags($_POST['id']);

            $data = array(
                'pelanggan_id' => $pelanggan_id,
                'pengguna_id'  => $pengguna_id,
            );

            $tabel = 'transaksi';
            $where = 'transaksi_id';

            $updateResult = $proses->edit_data($tabel, $data, $where, $id);

            echo '<script>alert("Edit Berhasil");window.location="../pages/penjualan.php";</script>';
            exit; // Make sure to stop the script execution after a redirect
        } else {
            echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/penjualan.php";</script>';
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/penjualan.php";</script>';
        exit; // Make sure to stop the script execution after an error
    }   
    }


    
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        try {
            $tabel = 'transaksi';
            $where = 'transaksi_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Akses Berhasil");window.location="../pages/penjualan.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/penjualan.php";</script>';
        }
    }

    if(!empty($_GET['aksi'] == 'hapus_detail'))
    {
        try {
            $tabel = 'detail_transaksi';
            $where = 'detail_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $id_detail = (int) strip_tags($_GET['id']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Berhasil");window.location="../pages/detail-transaksi.php?id=' . $id_detail . '";</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/detail-transaksi.php?id=' . $id_detail . '";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['pelanggan']) &&
                !empty($_POST['pengguna'])
            ) {
                $pelanggan_id = strip_tags($_POST['pelanggan']);
                $pengguna_id = strip_tags($_POST['pengguna']);

                $tabel = 'transaksi';
                $data[] = array(
                    'pelanggan_id'   => $pelanggan_id,
                    'pengguna_id'    => $pengguna_id,
                );
                $proses->tambah_data($tabel, $data);
                $last_inserted_id = $proses->get_last_inserted_id();
                //before window locaiton i need to get the id i just inserted 
                echo '<script>alert("Tambah Berhasil");window.location="../pages/detail-transaksi.php?id=' . $last_inserted_id . '";</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-transaksi.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-transaksi.php";</script>';
        }
    }

    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah_detail') {
        try {
            if (
                !empty($_POST['barang']) &&
                !empty($_POST['qty'])
            ) {
                $quantity = strip_tags($_POST['qty']);
                $barang_id = strip_tags($_POST['barang']);
                $transaksi_id = strip_tags($_POST['id']);

                $tabel = 'detail_transaksi';
                $data[] = array(
                    'quantity'   => $quantity,
                    'barang_id'    => $barang_id,
                    'transaksi_id'    => $transaksi_id,
                );
                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Berhasil");window.location="../pages/detail-transaksi.php?id=' . $transaksi_id . '";</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/detail-transaksi.php?id=' . $transaksi_id . '";';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/detail-transaksi.php?id=' . $transaksi_id . '";';
        }
    }

?>