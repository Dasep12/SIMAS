<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" disabled="disabled" value="<?= $data->nama_brg ?>">
        </div>
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" class="form-control" disabled="disabled" value="<?= $data->kode_brg ?>">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control select2" disabled="disabled" style="width: 100%;">
                <option selected="selected"><?= $data->kategori ?></option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Beli</label>
            <input type="text" class="form-control" disabled="disabled" value="<?= $data->tgl_beli ?>">
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control" disabled="disabled" value="<?= $data->status ?>">
        </div>
        <div class="form-group">
            <label>Posisi</label>
            <input type="text" class="form-control" disabled="disabled" value="<?= $data->posisi ?>">
        </div>
        <div class="form-group">
            <label>Kondisi</label>
            <textarea class="form-control" disabled="disabled"><?= $data->kondisi ?></textarea>
        </div>
    </div>

</div>