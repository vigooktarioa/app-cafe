<?php
    require 'panggil.php';
    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
        $role_name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['keterangan']);

        $data = array(
            'role_name'		    =>$role_name,
            'description'	    =>$description,
        );
        $tabel = 'roles';
        $where = 'role_id';
        $id = strip_tags($_POST['id_akses']);
        $proses->edit_data($tabel, $data, $where, $id);
        echo '<script>alert("Edit Data Hak Akses Berhasil");window.location="../pages/hak.php"</script>';
    }
    
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        try {
            $tabel = 'roles';
            $where = 'role_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            var_dump($result);
            echo '<script>alert("Delete Akses Berhasil");window.location="../pages/hak.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/hak.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        try {
            if (
                !empty($_POST['name']) &&
                !empty($_POST['keterangan'])
            ) {
                $role_name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['keterangan']);

                $tabel = 'roles';
                $data[] = array(
                    'role_name'     => $role_name,
                    'description'    => $description,
                );

                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Data User Berhasil");window.location="../pages/hak.php"</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-akses.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-akses.php";</script>';
        }
    }

?>