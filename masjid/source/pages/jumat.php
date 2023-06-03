<?php require("header.php") ?>

<h4><i class="bi bi-calendar2-week"></i>DATA JADWAL SHOLAT JUMAT</h4>
<h5>&nbsp;</h5>
<button type="button" class="btn btn-success" id="btnModalJumat">
    Tambah data
</button>
&nbsp;
<button type="button" class="btn btn-success" id="btnModalJumat">
    Laporan
</button>

<!-- Modal Data Jumat-->
<div class="modal fade" id="sholatJumatModal" tabindex="-1" aria-labelledby="titlesholatJumatModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="titlesholatJumatModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <label for="txtnik" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="txttgl">
                            <input type="hidden" class="form-control" id="txtidjumat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtnama" class="col-sm-3 col-form-label">Waktu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtwaktu">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txttempat" class="col-sm-3 col-form-label">Nama Khatib</label>
                        <div class="col-sm-9">
                            <Select class="form-control" id="txtkhatib"></Select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txttgl" class="col-sm-3 col-form-label">Nama Imam</label>
                        <div class="col-sm-9">
                            <Select class="form-control" id="txtimam"></Select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txttelp" class="col-sm-3 col-form-label">Nama Muadzin</label>
                        <div class="col-sm-9">
                            <Select class="form-control" id="txtmuadzin"></Select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtalamat" class="col-sm-3 col-form-label">Nama Bilal</label>
                        <div class="col-sm-9">
                            <Select class="form-control" id="txtbilal"></Select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bsdismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success" id="btnSholatJumat">Save changes</button>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="table-responsive margin">
    <table id="table-sholat-jumat" class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th style="width: 15px">Tanggal</th>
                <th style="width: 75px">Waktu</th>
                <th style="width: 100px">Nama Khatib</th>
                <th style="width: 100px">Nama Imam</th>
                <th style="width: 100px;">Nama Muadzin</th>
                <th style="width: 100px;">Nama Bilal</th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
    </table>
</div>
<?php require("footer.php") ?>