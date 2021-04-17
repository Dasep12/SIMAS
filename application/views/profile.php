<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('assets/')  ?>#">Home</a></li>
                        <li class="breadcrumb-item active">Manage</li>
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
                        <div class="col-12">
                            <div class="form-group">
                                <label>ID User</label>
                                <input type="text" disabled="" class="form-control" value="<?= $data->id_user ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama </label>
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <input type="text" autocomplete="off" id="nama" class="form-control" name="nama" value="<?= $data->nama ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*****">
                                <small class="text-danger"><i>*isi jika ingin ganti password saja*</i> </small>
                            </div>
                            <div class="form-group">
                                <label>Level User</label>
                                <select class="form-control" id="level" name="level" style="width: 100%;">
                                    <option selected="selected" value="<?= $data->role  ?>"><?= $data->role == 1 ? 'administrator' : 'petugas' ?></option>
                                    <option value="1">administrator</option>
                                    <option value="2">petugas</option>
                                </select>
                            </div>
                        </div>
                        <!-- end form left -->
                    </div>
                    <button class="btn btn-primary">Simpan <i class="fa fa-save"></i> </button>
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
            format: 'L',
        });

        $("#updatedata").on('submit', function(e) {
            e.preventDefault();
            if (document.getElementById('nama').value == "") {
                toastr.info('nama masih kosong');
                return;
            } else {
                var postData = new FormData(this);
                $.ajax({
                    url: "<?= base_url('Manage/update') ?>",
                    method: "POST",
                    data: postData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(e) {
                        //console.log(e);
                        alert(e);
                        window.location.href = "<?= base_url('Manage') ?>"
                    }
                });
            }
        })
    })
</script>