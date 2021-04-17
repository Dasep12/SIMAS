<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pace</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('assets/')  ?>#">Home</a></li>
                        <li class="breadcrumb-item active">Pace</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perbarui Data</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="#" method="post" id="updatedata">
                    <div class="row">
                        <!-- form left -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <input type="text" id="nama_brg" class="form-control" name="nama_brg" value="<?= $data->nama_brg ?>">
                            </div>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" id="kode_brg" name="kode_brg" value="<?= $data->kode_brg ?>">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control select2" id="kategori" name="kategori" style="width: 100%;">
                                    <option selected="selected"><?= $data->kategori ?></option>
                                    <option>Elektronik</option>
                                    <option>Non-Elektronik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Beli</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" id="tgl_beli" value="<?= $data->tgl_beli ?>" name="tgl_beli" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end form left -->

                        <!-- form right -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option selected=""><?= $data->status ?></option>
                                    <option>Aktif</option>
                                    <option>Rusak</option>
                                    <option>Baik/Cadangan</option>
                                    <option>Perbaikan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" id="posisi" name="posisi" class="form-control" value="<?= $data->posisi ?>">
                            </div>
                            <div class="form-group">
                                <label>Kondisi</label>
                                <textarea id="kondisi" name="kondisi" class="form-control"><?= $data->kondisi ?></textarea>
                            </div>
                        </div>
                        <!-- end form right -->
                    </div>
                    <button id="kirimdata" class="btn btn-primary">Simpan <i class="fa fa-save"></i> </button>
                </form>
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
</div>


<script>
    $(function() {
        //Date picker
        $('#reservationdate,#reservationdate2').datetimepicker({
            format: 'YYYY-MM-DD',
        });

        $("#updatedata").on('submit', function(e) {
            e.preventDefault();
            if (document.getElementById('nama_brg').value == "") {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: '<b>Perhatian</b>',
                    text: ' nama barang masih kosong'
                });
                return;
            } else if (document.getElementById('kode_brg').value == "") {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: '<b>Perhatian</b>',
                    text: ' kode barang masih kosong'
                });
                return;
            } else if (document.getElementById('tgl_beli').value == "") {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: '<b>Perhatian</b>',
                    text: ' tanggal beli barang masih kosong'
                });
                return;
            } else if (document.getElementById('posisi').value == "") {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: '<b>Perhatian</b>',
                    text: ' posisi barang masih kosong'
                });
                return;
            } else if (document.getElementById('kondisi').value == "") {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'error',
                    title: '<b>Perhatian</b>',
                    text: ' kondisi barang masih kosong'
                });
                return;
            } else {
                var postData = new FormData(this);
                $.ajax({
                    url: "<?= base_url('Master/update') ?>",
                    method: "POST",
                    data: postData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $("#kirimdata").prop('disabled', true);
                    },
                    complete: function() {
                        $("#kirimdata").prop('disabled', false);
                    },
                    success: function(e) {
                        alert(
                            'berhasil'
                        )
                        window.location.href = "<?= base_url('Master') ?>"
                    }
                });
            }
        })
    })
</script>