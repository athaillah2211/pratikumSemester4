<?php

 include "../model/koneksiDB.php";
 include "../model/modelPetugas.php";
 if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
 {
    $method=$_POST['method_petugas']; // cara yang dikirim dari js
    $crud = new modelPetugas();
    $retval = [];

    if($method == 'recordDataPetugas') // mengecek nilai method apakah menangkap data petugas
    {
    $list = $crud->recordDataPetugas();
    $retval['status'] = $list[0]; // membuat var yang dg nama status dari nilai array 0 recordDataPetugas
    $retval['message'] = $list[1]; // membuat var yang dg nama message dari nilai array 1 recordDataPetugas
    $retval['data'] = $list[2]; // membuat var yang dg nama data dari nilai array 2 recordDataPetugas
    echo json_encode($retval);
    }

    if($method == 'Simpan_Petugas') // mengecek nilai method apakah perintah simpan Data
    {
    $CtrlNIK = $_POST['js_nikPetugas'];
    $CtrlNama = $_POST['js_namaPetugas'];
    $CtrlTempatLahir = $_POST['js_tempatLahirPetugas'];
    $CtrlTanggalLahir = $_POST['js_tanggalLahirPetugas'];
    $CtrlTelp = $_POST['js_telpPetugas'];
    $CtrlAlamat = $_POST['js_alamatPetugas'];

    $simpan = $crud->simpanPetugas($CtrlNIK, $CtrlNama, $CtrlTempatLahir, $CtrlTanggalLahir, $CtrlTelp, $CtrlAlamat);
    $retval['status'] = $simpan[0];
    $retval['message'] = $simpan[1];
    $retval['duplicate'] = $simpan[2];
    echo json_encode($retval);
    }

    if($method == 'Ubah_Petugas') // mengecek nilai method apakah perintah ubah Data
    {
        $CtrlNIK = $_POST['js_nikPetugas'];
        $CtrlNama = $_POST['js_namaPetugas'];
        $CtrlTempatLahir = $_POST['js_tempatLahirPetugas'];
        $CtrlTanggalLahir = $_POST['js_tanggalLahirPetugas'];
        $CtrlTelp = $_POST['js_telpPetugas'];
        $CtrlAlamat = $_POST['js_alamatPetugas'];
    
        $ubah = $crud->ubahPetugas($CtrlNIK, $CtrlNama, $CtrlTempatLahir, $CtrlTanggalLahir, $CtrlTelp, $CtrlAlamat);
        $retval['status'] = $ubah[0];
        $retval['message'] = $ubah[1];
        echo json_encode($retval);
    }

    if($method == 'Hapus_Petugas')
    {
        $CtrlNIK = $_POST['js_nikPetugas'];
        $hapus = $crud->hapusPetugas($CtrlNIK);
        $retval['status'] = $hapus[0];
        $retval['message'] = $hapus[1];
        echo json_encode($retval);
    }

    if($method == 'Cari_NIK_Petugas')
    {
        $CtrlNIK = $_POST['js_nikPetugas'];
        $hapus = $crud->SatuBarisPetugas($CtrlNIK);
        $retval['status'] = $hapus[0];
        $retval['message'] = $hapus[1];
        $retval['data'] = $hapus[2];
        echo json_encode($retval);
    }


 }else{
 header("HTTP/1.1 401 Unauthorized");
    exit;
 }
 
?>