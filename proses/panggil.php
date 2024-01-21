<?php
    // panggil file
    include 'koneksi.php';
    include 'prosescrud.php';
    // cara panggil class di koneksi php
    $db = new Koneksi();
    // cara panggil koneksi di fungsi DBConnect()
    $koneksi =  $db->DBConnect();
    // panggil class prosesCrud di file prosescrud.php
    $proses = new prosesCrud($koneksi);
    // menghilangkan pesan error
    error_reporting(0);
    // panggil session ID
    $id = $_SESSION['ADMIN']['pengguna_id'];
    $sesi = $proses->tampil_data_id('users','pengguna_id',$id);
?>