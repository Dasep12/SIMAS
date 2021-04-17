        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="form-group">
                    <button data-toggle="modal" data-target="#addUser" class="btn btn-primary">Tambah User</button>
                </div>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Master Data</h3>

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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID User</th>
                                    <th>Nama</th>
                                    <th>Role </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($master as $master) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $master->id_user ?></td>
                                        <td><?= $master->nama ?></td>
                                        <td><?= $master->role ?></td>
                                        <td>
                                            <a onclick="return confirm('hapus ?')" href="<?= base_url('User/del/' . $master->id) ?>" class="small btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                            <a href="#" data-toggle="modal" data-id="<?= $master->id ?>" data-target="#detailuser" class="small btn btn-success btn-sm"><i class="fa fa-search"></i> </a>
                                            <a title="reset password" onclick="return confirm('reset  password ke 123  ?')" href="<?= base_url('User/reset/' . $master->id) ?>" class="small btn btn-primary btn-sm"><i class="fa fa-lock-open"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- modal detail data user -->
        <div class="modal fade" id="detailuser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="datauser">

                    </div>
                    <div class="modal-footer justify-content-left">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end of modal detail  data user  -->


        <!-- modal tambah data user -->
        <div class="modal fade" id="addUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="saveUser">
                            <div class="form-group">
                                <label>ID User</label>
                                <input type="text" name="id_user" class="form-control" id="iduser">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control" id="level">
                                    <option value="">Pilih Level</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Petugas</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-left">
                        <button type="submit" id="submit" class="btn btn-info">Simpan</button>
                    </div>

                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end of modal tambah data user  -->
        <?php if ($this->session->flashdata('info')) { ?>
            <script>
                $(function() {
                    toastr.success('Data berhasil terhapus')
                });
            </script>
        <?php } else if ($this->session->flashdata('error')) { ?>
            <script>
                $(function() {
                    toastr.error('Data gagal terhapus')
                });
            </script>
        <?php } else if ($this->session->flashdata('infopwd')) { ?>
            <script>
                $(function() {
                    toastr.success('Password direset ke 123 ')
                });
            </script>
        <?php } else if ($this->session->flashdata('errorpwd')) { ?>
            <script>
                $(function() {
                    toastr.error('Data gagal di resest')
                });
            </script>
        <?php } ?>
        <script>
            $(function() {
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
                //tampilkan detail barang ke
                $("#detailuser").on("show.bs.modal", function(event) {
                    var div = $(event.relatedTarget);
                    var modal = $(this);
                    // var id = $(this).attr('data-id');
                    var id = div.data('id');
                    //kirim data ke controller Master/detail
                    $.ajax({
                        url: "<?php echo base_url("User/detail/") ?>",
                        data: "id=" + id,
                        method: "POST",
                        success: function(response) {
                            $("#datauser").html(response);
                            //  console.log(id);
                        }
                    })
                })

                $("#saveUser").on('submit', function(e) {
                    e.preventDefault();
                    if (document.getElementById('iduser').value == "") {
                        toastr.error('id user tolong di isi');
                    } else if (document.getElementById('nama').value == "") {
                        toastr.error('nama tolong di isi');
                    } else if (document.getElementById('pwd').value == "") {
                        toastr.error('password tolong di isi');
                    } else if (document.getElementById('level').value == "") {
                        toastr.error('level tolong di isi');
                    } else {
                        $.ajax({
                            url: "<?= base_url('User/tambah') ?>",
                            data: new FormData(this),
                            method: "POST",
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(e) {
                                if (e === 'saved') {
                                    alert(e);
                                    location.reload();
                                } else {
                                    toastr.info(e);
                                }
                            }
                        })
                    }
                })
            })
        </script>