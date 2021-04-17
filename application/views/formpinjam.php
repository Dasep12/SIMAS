<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('assets/')  ?>#">Home</a></li>
                        <li class="breadcrumb-item active">Form Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <script>

    </script>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cari Barang</h3>

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
                <button data-toggle="modal" data-target="#barangmaster" class="btn  btn-info">Cari Barang <i class="fa fa-search-plus"></i> </button>
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Peminjaman</h3>

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
                <form action="#" method="post" id="pinjam">
                    <div class="row">
                        <!-- form left -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="hidden" name="idbarang" id="idbarang">
                                <input type="hidden" name="status_sebelumnya" id="status_sebelumnya">
                                <input type="hidden" name="posisi_sebelumnya" id="posisi_sebelumnya">
                                <input type="hidden" value="<?= date('Dymis') ?>" id="idpinjam" name="idpinjam" class="form-control">
                                <input readonly="" type="text" id="kdbarang" name="kdbarang" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" readonly="" id="nama_brg" name="nama_brg" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kategori Barang</label>
                                <input type="text" id="kategori_brg" readonly="" name="kategori_brg" class="form-control">
                            </div>
                        </div>
                        <!-- end form left -->

                        <!-- form right -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Peminjam</label>
                                <input type="text" id="peminjam" name="peminjam" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pinjam:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kembali:</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control datetimepicker-input" data-target="#reservationdate2" />
                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end form right -->
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i> </button>
                </form>
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<!-- modal form tambah jabatan -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="barangmaster" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                Data Master Barang
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <div class="modal-body" id="hstatus">
                <table class="table" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Status</th>
                            <th>Kondisi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($master as $d) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d->nama_brg ?></td>
                                <td><?= $d->kode_brg ?></td>
                                <td><?= $d->status ?></td>
                                <td><?= $d->kondisi ?></td>
                                <td>
                                    <?php if ($d->status == "dipinjam") { ?>
                                        <label class="btn btn-info btn-sm"><i class="fa fa-times"></i> tidak bisa dipinjam</label>
                                    <?php } else { ?>
                                        <a class="btn btn-danger btn-sm click" data-idbarang="<?= $d->id ?>" data-namabrg="<?= $d->nama_brg ?>" data-status="<?= $d->status ?>" data-posisi="<?= $d->posisi ?>" data-kdbarang="<?= $d->kode_brg ?>" data-kategori="<?= $d->kategori ?>">pilih <i class="fa fa-check"></i> </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- end of modal  -->
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

        $('.click').on('click', function(e) {
            document.getElementById('idbarang').value = $(this).attr('data-idbarang');
            document.getElementById('nama_brg').value = $(this).attr('data-namabrg');
            document.getElementById('kategori_brg').value = $(this).attr('data-kategori');
            document.getElementById('kdbarang').value = $(this).attr('data-kdbarang');
            document.getElementById('status_sebelumnya').value = $(this).attr('data-status');
            document.getElementById('posisi_sebelumnya').value = $(this).attr('data-posisi');
            $("#barangmaster").modal('hide');
        })

        //Date picker
        $('#reservationdate,#reservationdate2').datetimepicker({
            format: 'YYYY-MM-DD',
        });

        //pinjam data lewat ajax
        $("#pinjam").on('submit', function(e) {
            e.preventDefault();
            if (document.getElementById('kdbarang').value == "") {
                toastr.info('detail barang belum terisi');
            } else if (document.getElementById('peminjam').value == "") {
                toastr.info('peminjam barang belum terisi');
            } else if (document.getElementById('kdbarang').value == "") {
                toastr.info('kode barang belum terisi');
            } else if (document.getElementById('tgl_pinjam').value == "") {
                toastr.info('tanggal peminjaman belum terisi');
            } else if (document.getElementById('tgl_kembali').value == "") {
                toastr.info('tanggal kembali barang belum terisi');
            } else {
                var postData = new FormData(this);
                $.ajax({
                    url: "<?= base_url('Form/pinjam') ?>",
                    data: postData,
                    method: "POST",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(e) {
                        if (e == "failed") {
                            toastr.error(e, '', {
                                timeout: 3000
                            });
                        } else {
                            alert('berhasil');
                            location.reload();
                        }
                    }
                })
            }
        })
    })
</script>