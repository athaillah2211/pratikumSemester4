<?php

class modelPetugas extends koneksiDB
{
    public function __construct()
    {
        $this->hubungkanDatabase();
    }

    // method untuk Simpan Data jadwal Sholat Jumat 
    public function simpanSholatJumat($tgl, $waktu, $nik_khatib, $nik_imam, $nik_muadzin, $nik_bilal)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("INSERT INTO jadwal_sholat_jumat (tanggal,waktu,nik_khatib,nik_imam,nik_muadzin,nik_bilal)
        VALUES (:tgl, :waktu, :nikkhatib, :nikimam, :nikmuadzin, :nikbilal) ");
            $perintah->bindParam("tgl", $tgl);
            $perintah->bindParam("waktu", $waktu);
            $perintah->bindParam("nikkhatib", $nik_khatib);
            $perintah->bindParam("nikimam", $nik_imam);
            $perintah->bindParam("nikmuadzin", $nik_muadzin);
            $perintah->bindParam("nikbilal", $nik_bilal);
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil 
            $posisi[1] = "Data Jadwal Sholat Jumat Berhasil disimpan";

            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah 
            $posisi[1] = $psn->getMessage();
            return $posisi;
        }
    }

    // method untuk Ubah Data Jadwal Sholat Jumat
    public function ubahSholatJumat($id, $tgl, $waktu, $nik_khatib, $nik_imam, $nik_muadzin, $nik_bilal)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare(" UPDATE jadwal_sholat_jumat SET tanggal= :tgl, waktu= :waktu, nik_khatib= :nkhatib,
        nik_imam= :nimam, nik_muadzin= :nmuadzin, nik_bilal= :nbilal WHERE id= :idjumat");
            $perintah->bindParam("idjumat", $id);
            $perintah->bindParam("tgl", $tgl);
            $perintah->bindParam("waktu", $waktu);
            $perintah->bindParam("nkhatib", $nik_khatib);
            $perintah->bindParam("nimam", $nik_imam);
            $perintah->bindParam("nmuadzin", $nik_muadzin);
            $perintah->bindParam("nbilal", $nik_bilal);
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil 
            $posisi[1] = "Data Jadwal Sholat Jumat Berhasil diubah";
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah 
            $posisi[1] = $psn->getMessage();
            return $posisi;
        }
    }

    // method untuk Hapus Data Jadwal Sholat Jumat 
    public function hapusSholatJumat($id)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("DELETE FROM jadwal_sholat_jumat WHERE id= :idjumat");
            $perintah->bindParam("idjumat", $id);
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil 
            $posisi[1] = "Data Jadwal Sholat Jumat Berhasil Dihapus";
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah 
            $posisi[1] = $psn->getMessage();
            return $posisi;
        }
    }

    //method mengambil record data Jadwal Sholat Jumat 
    public function recordDataJadwalJumat()
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("SELECT*FROM view_sholat_jumat ORDER BY tanggal DESC");

            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil 
            $posisi[1] = "Data_Sholat_Jumat";
            $posisi[2] = $perintah->fetchAll(PDO::FETCH_ASSOC);
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah 
            $posisi[1] = $psn->getMessage();
            $posisi[2] = [];
            return $posisi;
        }
    }

    //method mengambil record data petugas 1 baris untuk ditampilkan ke modal inputan 
    public function SatuBarisJumat($id)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("SELECT*FROM jadwal_sholat_jumat WHERE id='idjumat'");

            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil 
            $posisi[1] = "Data Jadwal Sholat Jumat Satu Baris";
            $posisi[2] = $perintah->fetchAll(PDO::FETCH_ASSOC);
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah 
            $posisi[1] = $psn->getMessage();
            $posisi[2] = [];
            return $posisi;
        }
    }

    //method getNIK Petugas 
    public function getnikPetugasJumat($varnNama)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("SELECT*FROM petugas WHERE nama='$varnNama'");
            $perintah->execute();
            $petugas = $perintah->fetch();
            return $petugas['nik'];
        } catch (PDOException $psn) {
            return $psn->getMessage();
        }
    }
}


?>