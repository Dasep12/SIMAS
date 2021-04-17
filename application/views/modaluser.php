<div class="form-group">
    <label>ID User</label>
    <input type="text" class="form-control" disabled="disabled" value="<?= $data->id_user ?>">
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" disabled="disabled" value="<?= $data->nama ?>">
</div>
<div class="form-group">
    <label>Level</label>
    <select class="form-control select2" disabled="disabled" style="width: 100%;">
        <option selected="selected">

            <?= $data->role == 1 ? 'administrator' : 'petugas' ?>
        </option>
    </select>
</div>