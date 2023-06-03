<?php
$project_location = "/masjid";
$me = $project_location;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case $me . '/':
        require "source/pages/home.php";
        break;
    case $me . '/petugas':
        require "source/pages/petugas.php";
        break;
    case $me . '/fardhu':
        require "source/pages/fardhu.php";
        break;
    case $me . '/jumat':
        require "source/pages/jumat.php";
        break;
    case $me . '/pengajian':
        require "source/pages/pengajian.php";
        break;
    default:
        http_response_code(404);
        require "source/pages/404.php";
        break;
}
?>