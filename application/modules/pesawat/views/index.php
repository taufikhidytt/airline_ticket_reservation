<!-- Css Datatable -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- sweetalert2 -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.css">

<style>
    .swal2-popup{
        font-size: 1.5rem !important;
    }
</style>

<!-- script Datatable -->
<script src="<?= base_url()?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- sweetalert -->
<script src="<?= base_url()?>assets/admin/sweetalert/sweetalert2.min.js"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $judul?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('pesawat')?>"><i class="fa fa-plane"></i> Data Pesawat</a></li>
    </ol>
</section>

<div id="flashSuccess" data-success="<?= $this->session->flashdata('success');?>"></div>
<div id="flashWarning" data-warning="<?= $this->session->flashdata('warning');?>"></div>
<div id="flashError" data-error="<?= $this->session->flashdata('error');?>"></div>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pesawat</h3>
            <div class="pull-right">
                <a href="<?= base_url('pesawat/add')?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add Pesawat
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="tablepesawat">
                    <thead style="background-color:#3c8dbc; color:#fff;">
                        <tr>
                            <th>No</th>
                            <th>Kode Pesawat</th>
                            <th>Nama Pesawat</th>
                            <th>Awal Berangkat Pesawat</th>
                            <th>Tujuan Pesawat</th>
                            <th>Waktu Berangkat Pesawat</th>
                            <th>Harga Ticket Pesawat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($data as $data):?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $data->kode_pesawat?></td>
                            <td><?= $data->nama_pesawat?></td>
                            <td><?= $data->keberangkatan_pesawat?></td>
                            <td><?= $data->tujuan_pesawat?></td>
                            <td><?= date('d-m-Y', strtotime($data->waktu_berangkat))?></td>
                            <td><?= $data->harga?></td>
                            <td>
                                <a href="<?= base_url('pesawat/update/'.$data->id_pesawat)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a> |
                                <form action="<?= base_url('pesawat/del')?>" method="post" class="inline">
                                    <input type="hidden" name="id_pesawat" value="<?= $data->id_pesawat?>">
                                    <button class="btn btn-xs btn-danger" id="form-delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $('#tablepesawat').DataTable();
    var flashSuccess = $('#flashSuccess').data('success');
    var flashWarning = $('#flashWarning').data('warning');
    var flashError = $('#flashError').data('error');
    if(flashSuccess){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flashSuccess,
        });
    }
    if(flashWarning){
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: flashWarning,
        });
    }
    if(flashError){
        Swal.fire({
            icon: 'error',
            title: 'error',
            text: flashError,
        });
    }

    $(document).on('click', '#form-delete', function(e){
        e.preventDefault();
        var link = $(this).parent('form');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yaa, Hapus Data Ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                link.submit();
            }
        })

    });
</script>