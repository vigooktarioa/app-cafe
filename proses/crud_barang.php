<?php
    require 'panggil.php';

	if(!empty($_GET['aksi'] == 'edit'))
	{
    try {
		 $name = strip_tags($_POST['name']);
         $category = strip_tags($_POST['category']);
         $price = strip_tags($_POST['price']);
         $supplier_id = strip_tags($_POST['supplier']);
		
        $data = array(
             'name'         => $name,
             'category'     => $category,
             'price'        => $price,
             'supplier_id'  => $supplier_id,
        );
        $tabel = 'barang';
        $where = 'barang_id';
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
            $tabel = 'barang';
            $where = 'barang_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Data Berhasil");window.location="../pages/barang.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/barang.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['name']) &&
                !empty($_POST['category']) &&
                !empty($_POST['price']) &&
                !empty($_POST['supplier'])
            ) {
                $name = strip_tags($_POST['name']);
                $category = strip_tags($_POST['category']);
                $price = strip_tags($_POST['price']);
                $supplier_id = strip_tags($_POST['supplier']);

                $tabel = 'barang';
                $data[] = array(
                    'name'    => $name,
                    'category'     => $category,
                    'price'  => $price,
                    'supplier_id'  => $supplier_id,
                );

                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Data Berhasil");window.location="../pages/barang.php"</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-barang.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-barang.php";</script>';
        }
    }

?>