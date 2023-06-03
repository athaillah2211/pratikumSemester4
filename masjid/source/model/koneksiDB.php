<?php

class koneksiDB
{
    public $databasenya;

    public function __construct()
    {
    }



    public function hubungkanDatabase()
    {
        $user = "root";
        $password = "";
        $namaDatabase = "dbmonitoring_masjid";
        try {
            $this->databasenya = new PDO("mysql:host=localhost;dbname=" . $namaDatabase . ";
            charset=latin1", $user, $password, array(PDO::ATTR_PERSISTENT => true));
            $this->databasenya->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $salah) {
            die("Gagal Koneksi");
        }
    }
}


?>