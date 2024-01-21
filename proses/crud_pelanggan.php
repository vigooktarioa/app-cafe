<?php
    require 'panggil.php';

	if(!empty($_GET['aksi'] == 'edit'))
	{
    try {
		$firstname = strip_tags($_POST['first']);
		$lastname = strip_tags($_POST['last']);
		$phone_number = strip_tags($_POST['phone']);
		
        $data = array(
            'firstname'	    =>$firstname,
            'lastname'		    =>$lastname,
            'phone_number'		=>$phone_number,
        );
        $tabel = 'customers';
        $where = 'pelanggan_id';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel, $data, $where, $id);
        echo '<script>alert("Edit Data Berhasil");window.location="../pages/pelanggan.php"</script>';
    } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/pelanggan.php";</script>';
        }
    }
    
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        try {
            $tabel = 'customers';
            $where = 'pelanggan_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Data User Berhasil");window.location="../pages/pelanggan.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/pelanggan.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['first']) &&
                !empty($_POST['last']) &&
                !empty($_POST['phone'])
            ) {
                $firstname = strip_tags($_POST['first']);
                $lastname = strip_tags($_POST['last']);
                $phone_number = strip_tags($_POST['phone']);

                $tabel = 'customers';
                $data[] = array(
                    'firstname'    => $firstname,
                    'lastname'     => $lastname,
                    'phone_number'  => $phone_number,
                );

                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Data Berhasil");window.location="../pages/pelanggan.php"</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-pelanggan.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-pelanggan.php";</script>';
        }
    }

?>