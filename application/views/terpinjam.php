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

                <?php if ($this->session->flashdata('info')) {  ?>
                    <div class="alert alert-info">
                        <b>Berhasil</b> Barang Kembali
                    </div>
                <?php } else if ($this->session->flashdata('error')) {  ?>
                    <div class="alert alert-danger">
                        <b>Gagal</b> terjadi kesalahan
                    </div>
                <?php } ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Barang Terpinjam</h3>
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
                                    <th>No Peminjaman</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Peminjam</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($terpinjam as $master) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><a href="" data-toggle="modal" data-id="<?= $master->id ?>" data-target="#detail_barang"><u><?= $master->idpinjam ?></u> </a></td>
                                        <td><?= $master->kode_brg ?></td>
                                        <td><?= $master->nama_brg ?></td>
                                        <td><?= $master->tgl_pinjam ?></td>
                                        <td><?= $master->tgl_kembali ?></td>
                                        <td><?= $master->peminjam ?></td>
                                        <td>
                                            <a onclick="return confirm('Kembalikan ?')" href="<?= base_url('Terpinjam/back/' . $master->id . "/" . $master->idbarang) ?>" class="small btn btn-info btn-sm"><i class="fa fa-edit"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <small class="text-danger">*klik no peminjaman untuk lihat*</small>
                    </div>
                    <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- modal data barang -->
        <div class="modal fade" id="detail_barang">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="databarang">

                    </div>
                    <div class="modal-footer justify-content-left">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end of modal data barang -->

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
                $("#detail_barang").on("show.bs.modal", function(event) {
                    var div = $(event.relatedTarget);
                    var modal = $(this);
                    var id = div.data('id');
                    //kirim data ke controller Terpinjam/modalpinjam
                    $.ajax({
                        url: "<?php echo base_url("Terpinjam/modalpinjam/") ?>",
                        data: "id=" + id,
                        method: "POST",
                        success: function(response) {
                            $("#databarang").html(response);
                            //  console.log(id);
                        }
                    })
                })
            })
        </script>