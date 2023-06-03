<?php

class modelPetugas extends koneksiDB
{
    public function __construct()
    {
        $this->hubungkanDatabase();
    }

    // method untuk Simpan Data Petugas
    public function simpanPetugas($varNIK, $varNama, $varTempat, $varTgl, $varTelp, $varAlamat)
    {
        $varDB = $this->databasenya;
        try {
            // mengecek duplikasi NIK saat diinputkan
            $perintah = $varDB->prepare("SELECT*FROM petugas WHERE nik='$varNIK'");
            $perintah->execute();
            if ($perintah->rowCount() > 0) {
                $posisi[0] = true; //acuan kode berhasil
                $posisi[1] = "NIK sudah terdaftar";
                $posisi[2] = "Duplicate Yes";
            } else {
                $perintah = $varDB->prepare("INSERT INTO petugas (nik,nama,tempat_lahir,tanggal_lahir,telp,alamat) VALUES (:nik, :nama, :tempat, :tanggal, :telp, :alamat) ");
                $perintah->bindParam("nik", $varNIK);
                $perintah->bindParam("nama", $varNama);
                $perintah->bindParam("tempat", $varTempat);
                $perintah->bindParam("tanggal", $varTgl);
                $perintah->bindParam("telp", $varTelp);
                $perintah->bindParam("alamat", $varAlamat);
                $perintah->execute();
                $posisi[0] = true; //acuan kode berhasil
                $posisi[1] = "Data Petugas Berhasil disimpan";
                $posisi[2] = "Duplicate No";
            }

            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah
            $posisi[1] = $psn->getMessage();
            return $posisi;
        }
    }

    // method untuk Ubah Data Petugas
    public function ubahPetugas($varNIK, $varNama, $varTempat, $varTgl, $varTelp, $varAlamat)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare(" UPDATE petugas SET nama= :nama, tempat_lahir= :tempat, tanggal_lahir= :tanggal,
            telp= :telp, alamat= :alamat WHERE nik= :nik");
            $perintah->bindParam("nik", $varNIK);
            $perintah->bindParam("nama", $varNama);
            $perintah->bindParam("tempat", $varTempat);
            $perintah->bindParam("tanggal", $varTgl);
            $perintah->bindParam("telp", $varTelp);
            $perintah->bindParam("alamat", $varAlamat);
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil
            $posisi[1] = "Data Petugas Berhasil diubah";
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah
            $posisi[1] = $psn->getMessage();
            return $posisi;
        }
    }

    // method untuk Hapus Data Petugas
    public function hapusPetugas($varNIK)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("DELETE FROM petugas WHERE nik= :nik");
            $perintah->bindParam("nik", $varNIK);
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil
            $posisi[1] = "Data Petugas Berhasil dihapus";
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah
            $posisi[1] = $psn->getMessage();
            return $posisi;
        }
    }

    //method mengambil record data petugas
    public function recordDataPetugas()
    {
        $varDB = $this->databasenya;
        try {

            $perintah = $varDB->prepare("SELECT*FROM petugas ORDER BY nik ASC");
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil
            $posisi[1] = "Data_Petugas";
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
    public function SatuBarisPetugas($varNIK)
    {
        $varDB = $this->databasenya;
        try {
            $perintah = $varDB->prepare("SELECT*FROM petugas WHERE nik='$varNIK'");
            $perintah->execute();
            $posisi[0] = true; //acuan kode berhasil
            $posisi[1] = "Data Petugas Satu Baris";
            $posisi[2] = $perintah->fetchAll(PDO::FETCH_ASSOC);
            return $posisi;
        } catch (PDOException $psn) {
            $posisi[0] = false; //acuan kode salah
            $posisi[1] = $psn->getMessage();
            $posisi[2] = [];
            return $posisi;
        }
    }
}



?>