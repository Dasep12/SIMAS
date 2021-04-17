<div class="row">
    <!-- form left -->
    <div class="col-6">
        <div class="form-group">
            <label>ID Peminjaman</label>
            <input readonly="" value="<?= $data->idpinjam ?>" type="text" id="kdbarang" name="kdbarang" class="form-control">
        </div>
        <div class="form-group">
            <label>Kode Barang</label>
            <input readonly="" value="<?= $data->kode_brg ?>" type="text" id="kdbarang" name="kdbarang" class="form-control">
        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" readonly="" value="<?= $data->nama_brg ?>" id="nama_brg" name="nama_brg" class="form-control">
        </div>
        <div class="form-group">
            <label>Kategori Barang</label>
            <input type="text" id="kategori_brg" value="<?= $data->kategori_brg ?>" readonly="" name="kategori_brg" class="form-control">
        </div>
    </div>
    <!-- end form left -->

    <!-- form right -->
    <div class="col-6">
        <div class="form-group">
            <label>Petugas</label>
            <input type="text" readonly="" value="<?= $data->petugas ?>" name="peminjam" autocomplete="off" class="form-control">
        </div>
        <div class="form-group">
            <label>Peminjam</label>
            <input type="text" readonly="" value="<?= $data->peminjam ?>" name="peminjam" autocomplete="off" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" readonly="" value="<?= $data->tgl_pinjam ?>" name="tgl_pinjam" id="tgl_pinjam" class="form-control datetimepicker-input" data-target="#reservationdate" />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                <input type="text" readonly="" value="<?= $data->tgl_kembali ?>" id="tgl_kembali" name="tgl_kembali" class="form-control datetimepicker-input" data-target="#reservationdate2" />
                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form right -->
</div>