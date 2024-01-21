<?php
    require 'panggil.php';

    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['name']) &&
                !empty($_POST['contact']) &&
                !empty($_POST['nomor']) 
            ) {
                $name = strip_tags($_POST['name']);
                $contact_name = strip_tags($_POST['contact']);
                $contact_phone = strip_tags($_POST['nomor']);

                $tabel = 'supplier';
                $data[] = array(
                    'name'          => $name,
                    'contact_name'  => $contact_name,
                    'contact_phone' => $contact_phone,
                );
                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Data Supplier Berhasil");window.location="../pages/supplier.php"</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-supplier.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-supplier.php";</script>';
        }
    }

    
    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
        try {
		 $name = strip_tags($_POST['name']);
         $contact_name = strip_tags($_POST['contact']);
         $contact_phone = strip_tags($_POST['nomor']);
		
         $data[] = array(
            'name'          => $name,
            'contact_name'  => $contact_name,
            'contact_phone' => $contact_phone,
        );

        $tabel = 'supplier';
        $where = 'supplier_id';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel, $data, $where, $id);

        echo '<script>alert("Edit Data Berhasil");window.location="../pages/supplier.php"</script>';
    } catch (Exception $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-supplier.php";</script>';
    }
    }
    
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        try {
            $tabel = 'supplier';
            $where = 'supplier_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Data User Berhasil");window.location="../pages/supplier.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/supplier.php";</script>';
        }
    }

?>