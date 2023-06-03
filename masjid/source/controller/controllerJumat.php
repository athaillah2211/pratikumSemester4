<?php
include "../model/koneksiDB.php";
include "../model/modelJumat.php";
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    $method = $_POST['method_jumat']; // cara yang dikirim dari js 
    $crud = new modelPetugas();
    $retval = [];

    if ($method == 'recordDataJadwalJumat') // mengecek nilai method apakah menangkap data petugas
    {
        $list = $crud->recordDataJadwalJumat();
        $retval['status'] = $list[0];
        $retval['message'] = $list[1];
        $retval['data'] = $list[2];
        echo json_encode($retval);
    }

    if ($method == 'Satu_BarisJumat') // mengecek nilai method apakah menangkap data Jadwal Jumat
    {
        $CtrlId = $_POST['js_IdJumat'];
        $list = $crud->SatuBarisJumat($CtrlId);
        $retval['status'] = $list[0];
        $retval['message'] = $list[1];
        $retval['data'] = $list[2];
        echo json_encode($retval);
    }

    if ($method == 'Get_NIK_Petugas') // mengecek nilai method apakah menangkap data NIK Petugas
    {
        $CtrlId = $_POST['js_namaPetugas'];
        $list = $crud->getnikPetugasJumat($CtrlId);
        $retval['status'] = $list[0];
        $retval['message'] = $list[1];
        $retval['data'] = $list[2];
        echo json_encode($retval);
    }

    if ($method == 'Simpan_JadwalJumat') // mengecek nilai method apakah perintah simpan Data
    {
        $CtrlTGL = $_POST['js_tanggaljumat'];
        $CtrlWAKTU = $_POST['js_waktujumat'];
        $CtrlNIKKhatib = $crud->getnikPetugasJumat($_POST['js_khatibjumat']);
        $CtrlNIKImam = $crud->getnikPetugasJumat($_POST['js_imamjumat']);
        $CtrlNIKMuadzin = $crud->getnikPetugasJumat($_POST['js_muadzinjumat']);
        $CtrlNIKBilal = $crud->getnikPetugasJumat($_POST['js_bilaljumat']);

        $simpan = $crud->simpanSholatJumat($CtrlTGL, $CtrlWAKTU, $CtrlNIKKhatib, $CtrlNIKImam, $CtrlNIKMuadzin, $CtrlNIKBilal);
        $retval['status'] = $simpan[0];
        $retval['message'] = $simpan[1];
        echo json_encode($retval);
    }

    if ($method == 'Ubah_JadwalJumat') // mengecek nilai method apakah perintah ubah Data
    {
        $CtrlIdJumat = $_POST['js_idjumat'];
        $CtrlTGL = $_POST['js_tanggaljumat'];
        $CtrlWAKTU = $_POST['js_waktujumat'];
        $CtrlNIKKhatib = $crud->getnikPetugasJumat($_POST['js_khatibjumat']);
        $CtrlNIKImam = $crud->getnikPetugasJumat($_POST['js_imamjumat']);
        $CtrlNIKMuadzin = $crud->getnikPetugasJumat($_POST['js_muadzinjumat']);
        $CtrlNIKBilal = $crud->getnikPetugasJumat($_POST['js_bilaljumat']);

        $ubah = $crud->ubahSholatJumat($CtrlIdJumat, $CtrlTGL, $CtrlWAKTU, $CtrlNIKKhatib, $CtrlNIKImam, $CtrlNIKMuadzin, $CtrlNIKBilal);
        $retval['status'] = $ubah[0];
        $retval['message'] = $ubah[1];
        echo json_encode($retval);
    }

    if ($method == 'Hapus_JadwalJumat') {
        $CtrlIdJumat = $_POST['js_idjumat'];
        $hapus = $crud->hapusSholatJumat($CtrlIdJumat);
        $retval['status'] = $hapus[0];
        $retval['message'] = $hapus[1];
        echo json_encode($retval);
    }

    if ($method == 'Cari_NIK_Petugas') {
        $CtrlNIK = $_POST['js_nikPetugas'];
        $hapus = $crud->SatuBarisPetugas($CtrlNIK);
        $retval['status'] = $hapus[0];
        $retval['message'] = $hapus[1];
        $retval['data'] = $hapus[2];
        echo json_encode($retval);
    }
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
?>