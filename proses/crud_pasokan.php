<?php
    require 'panggil.php';

	if(!empty($_GET['aksi'] == 'edit'))
	{
    try {
        $barang_id = strip_tags($_POST['barang']);
        $supplier_id = strip_tags($_POST['supplier']);
        $reorder_level = strip_tags($_POST['level']);
        $reorder_quantity = strip_tags($_POST['level_qty']);
        $last_restock_date = strip_tags($_POST['date']);
		
        $data[] = array(
            'barang_id'    => $barang_id,
            'supplier_id'     => $supplier_id,
            'reorder_level'  => $reorder_level,
            'reorder_quantity'  => $reorder_quantity,
            'last_restock_date'  => $last_restock_date,
        );
        $tabel = 'inventory';
        $where = 'id';
        $id = strip_tags($_POST['id_login']);

        $proses->edit_data($tabel, $data, $where, $id);
        echo '<script>alert("Edit Data Berhasil");window.location="../pages/barang.php"</script>';
    } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/barang.php";</script>';
        }
    }
    
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        try {
            $tabel = 'inventory';
            $where = 'id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Data Berhasil");window.location="../pages/pasokan.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/pasokan.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['barang']) &&
                !empty($_POST['supplier']) &&
                !empty($_POST['qty']) &&
                !empty($_POST['level_qty']) &&
                !empty($_POST['date']) &&
                !empty($_POST['level'])
            ) {
                $barang_id = strip_tags($_POST['barang']);
                $supplier_id = strip_tags($_POST['supplier']);
                $quantity_in_stock = strip_tags($_POST['qty']);
                $reorder_level = strip_tags($_POST['level']);
                $reorder_quantity = strip_tags($_POST['level_qty']);
                $last_restock_date = strip_tags($_POST['date']);

                $tabel = 'inventory';
                $data[] = array(
                    'barang_id'    => $barang_id,
                    'supplier_id'     => $supplier_id,
                    'reorder_level'  => $reorder_level,
                    'reorder_quantity'  => $reorder_quantity,
                    'quantity_in_stock'  => $quantity_in_stock,
                    'last_restock_date'  => $last_restock_date,
                );

                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Data Berhasil");window.location="../pages/pasokan.php"</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-pasokan.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-pasokan.php";</script>';
        }
    }

?>