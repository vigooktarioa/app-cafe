<?php
    require 'panggil.php';

        if (!empty($_GET['aksi']) && $_GET['aksi'] == 'register') {
            try {
                if (
                    !empty($_POST['username']) &&
                    !empty($_POST['password']) &&
                    !empty($_POST['first_name']) &&
                    !empty($_POST['last_name'])
                ) {
                    $username = strip_tags($_POST['username']);
                    $password = strip_tags($_POST['password']);
                    $first_name = strip_tags($_POST['first_name']);
                    $last_name = strip_tags($_POST['last_name']);

                    $tabel = 'users';
                    $data[] = array(
                        'username'      => $username,
                        'password'      => md5($password),
                        'first_name'    => $first_name,
                        'last_name'     => $last_name,
                    );
                    $proses->tambah_data($tabel, $data);
                    echo '<script>alert("Tambah Data User Berhasil");window.location="../pages/sign-in.php"</script>';
                } else {
                    echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/sign-up.php";</script>';
                }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/sign-up.php";</script>';
        }
    }

        // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
    try {
        $user = strip_tags($_POST['username']);
        $pass = strip_tags($_POST['password']);
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../pages/sign-in.php?get=gagal';</script>";
        }else{
            $accessLevel = $proses->get_user_access_level($result['role_id']);
            session_start();
            $_SESSION['ACCESS_LEVEL'] = $accessLevel;
            echo "<script>window.location='../pages/dashboard.php';</script>";
        }
    } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/sign-in.php";</script>';
        }
    }
    
	if(!empty($_GET['aksi'] == 'edit_user'))
	{
		$username = strip_tags($_POST['username']);
		$first_name = strip_tags($_POST['first']);
		$last_name = strip_tags($_POST['last']);
		$address = strip_tags($_POST['address']);
		$phone_number = strip_tags($_POST['phone']);
		$role_id = strip_tags($_POST['access']);
		
        $data = array(
            'username'		    =>$username,
            'first_name'	    =>$first_name,
            'last_name'		    =>$last_name,
            'phone_number'		=>$phone_number,
            'address'		    =>$address,
            'role_id'		    =>$role_id
        );
        $tabel = 'users';
        $where = 'role_id';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel, $data, $where, $id);
        echo '<script>alert("Edit Data User Berhasil");window.location="../pages/pengguna.php"</script>';
    }
    
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        try {
            $tabel = 'users';
            $where = 'pengguna_id';
            $id = (int) strip_tags($_GET['hapusid']);
            $result = $proses->hapus_data($tabel, $where, $id);
            echo '<script>alert("Delete Data User Berhasil");window.location="../pages/pengguna.php"</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/pengguna.php";</script>';
        }
    }
    
    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'tambah_user') {
        try {
            if (
                !empty($_POST['username']) &&
                !empty($_POST['password']) &&
                !empty($_POST['first']) &&
                !empty($_POST['last']) &&
                !empty($_POST['address']) &&
                !empty($_POST['phone']) &&
                !empty($_POST['access'])
            ) {
                $username = strip_tags($_POST['username']);
                $password = strip_tags($_POST['password']);
                $first_name = strip_tags($_POST['first']);
                $last_name = strip_tags($_POST['last']);
                $address = strip_tags($_POST['address']);
                $phone_number = strip_tags($_POST['phone']);
                $role_id = strip_tags($_POST['access']);

                $tabel = 'users';
                $data[] = array(
                    'username'      => $username,
                    'password'      => md5($password),
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'address'       => $address,
                    'phone_number'  => $phone_number,
                    'role_id'       => $role_id
                );

                $proses->tambah_data($tabel, $data);
                echo '<script>alert("Tambah Data User Berhasil");window.location="../pages/pengguna.php"</script>';
            } else {
                echo '<script>alert("Semua komponen wajib diisi");window.location="../pages/add-user.php";</script>';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo '<script>alert("Error: ' . $e->getMessage() . '");window.location="../pages/add-user.php";</script>';
        }
    }

?>