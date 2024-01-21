<?php
    require 'panggil.php';
    
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
            $tabel = 'pembelian_barang';
            $where = 'pembelian_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Akses Berhasil");window.location="../pages/pembelian.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/pembelian.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['barang']) &&
                !empty($_POST['supplier']) &&
                !empty($_POST['qty']) &&
                !empty($_POST['price']) 
            ) {
                $barang_id = strip_tags($_POST['barang']);
                $supplier_id = strip_tags($_POST['supplier']);
                $quantity = strip_tags($_POST['qty']);
                $price_per_item = strip_tags($_POST['price']);

                $tabel = 'pembelian_barang';
                $data[] = array(
                    'barang_id'   => $barang_id,
                    'supplier_id'    => $supplier_id,
                    'quantity'    => $quantity,
                    'price_per_item'    => $price_per_item,
                );
                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Berhasil");window.location="../pages/pembelian.php";</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-pembelian.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-pembelian.php";</script>';
        }
    }

?>