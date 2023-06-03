<?php require("header.php") ?>

<h4><i class="bi bi-person-badge"></i>DATA PETUGAS MASJID</h4>
<h5>&nbsp;</h5>
<button type="button" class="btn btn-success" id="btnModalPetugas">
  Tambah Data
</button>
&nbsp;
<button type="button" class="btn btn-success" id="btnLaporanPetugas">
  Laporan
</button>

<!-- Modal Data Petugas-->
<div class="modal fade" id="petugasModal" tabindex="-1" aria-labelledby="titlePetugasModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="titlePetugasModal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row mb-3">
            <label for="txtnik" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtnik">
            </div>
          </div>
          <div class="row mb-3">
            <label for="txtnama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtnama">
            </div>
          </div>
          <div class="row mb-3">
            <label for="txttempat" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txttempat">
            </div>
          </div>
          <div class="row mb-3">
            <label for="txttgl" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="txttgl">
            </div>
          </div>
          <div class="row mb-3">
            <label for="txttelp" class="col-sm-3 col-form-label">No. Telp</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txttelp">
            </div>
          </div>
          <div class="row mb-3">
            <label for="txtalamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtalamat">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-success" id="btnPetugas">Save changes</button>
      </div>
    </div>
  </div>
</div>

<br><br>
<div class="table-responsive margin">
  <table id="table-petugas" class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th style="width: 15px">NIK</th>
        <th style="width: 200px">Nama Petugas</th>
        <th style="width: 50px">Tempat Lahir</th>
        <th style="width: 50px">Tanggal Lahir</th>
        <th style="width: 25px;">Telp</th>
        <th style="width: 150px;">Alamat</th>
        <th style="width: 50px;"></th>
      </tr>
    </thead>


  </table>


</div>


<?php require("footer.php") ?>