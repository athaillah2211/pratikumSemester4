<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Masjid</title>
  <link rel="stylesheet" href="./source/lib/css/bootstrap.min.css">
  <link rel="stylesheet" href="./source/lib/css/sweetalert.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="source/lib/css/index.css">
</head>

<body>
  <div>
    <div class="sidebar p-4 bg-success menu" id="sidebar">
      <h4 class="mb-5 text-white">MASJID UNISKA</h4>
      <li>
        <a class="text-white " href="./petugas">
          <i class="bi bi-file-earmark-person mr-2  active"></i>
          Petugas
        </a>
      </li>
      <li>
        <a class="text-white" href="./jumat">
          <i class="bi bi-calendar-week mr-2"></i>
          Sholat Jumat
        </a>
      </li>
      <li>
        <a class="text-white" href="./fardhu">
          <i class="bi bi-calendar-check-fill mr-2"></i>
          Sholat Fardhu
        </a>
      </li>
      <li>
        <a class="text-white" href="./pengajian">
          <i class="bi bi-calendar2-event mr-2"></i>
          Pengajian
        </a>
      </li>
    </div>
  </div>
  <div class="p-4" id="main-content">
    <button class="btn btn-success" id="btn-toggle">
      <i class="bi bi-list"></i>
    </button>
    <div class="card mt-5">
      <div class="card-body"></div>