<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Barang Baru</h1>
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
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <b>Perhatian</b> <?= $this->session->flashdata('error') ?>
            </div>
        <?php } else if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <b>berhasil <i class="fa fa-check"></i> </b> <?= $this->session->flashdata('error') ?>
            </div>
        <?php } ?>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Upload Data</h3>
            </div>
            <div class="card-body">
                <form onsubmit="return validasi()" action="<?= base_url('Upload') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" onchange="return cek()" class="form-control" name="file" id="file">
                    </div>
                    <div class="form-inline">
                        <button type="submit" name="submit" id="submit" class="btn  btn-info">Review <i class="fa fa-search"></i> </button>
                        <a href="<?= base_url('assets/upload/format.xlsx') ?>" class="btn btn-success ml-2">format <i class="fa fa-file-excel"></i> </a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
    <?php if (isset($_POST['submit'])) { ?>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Upload</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Upload/posting') ?>" method="post" id="pinjam">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Posisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($sheet as $d) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $d['C'] ?></td>
                                        <td><?= $d['B'] ?></td>
                                        <td><?= $d['D'] ?></td>
                                        <td><?= $d['F'] ?></td>
                                        <td><?= $d['H'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button class="btn btn-primary">Posting <i class="fa fa-save"></i> </button>
                    </form>
                </div>
                <!-- /.card -->
        </section>
        <!-- /.content -->
    <?php } ?>

</div>

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
    })


    function cek() {
        const file = document.getElementById('file');
        const path = file.value;
        const exe = /(\.xlsx)$/i;
        if (!exe.exec(path)) {
            toastr.info('File tidak diijinkan');
            file.value = "";
        }
    }

    function validasi() {
        const file = document.getElementById('file');
        if (file.value == "" || file.value == null) {
            toastr.info('File terlampir kosong')
            return false;
        }
    }
</script>