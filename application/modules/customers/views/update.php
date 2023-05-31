
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
        <li><a href="<?= base_url('customers')?>"><i class="fa fa-users"></i> Data Customers</a></li>
        <li class="active">Add Customers</li>
    </ol>
</section>

<?= $this->session->flashdata('photoError');?>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <div class="pull-right">
                <a href="<?= base_url('customers')?>" class="btn btn-github btn-sm">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group <?= form_error('nama_customers') ? 'has-error' : null ?>">
                            <input type="hidden" name="id_customers" id="id_customers" value="<?= $data->id_customers?>">
                            <label for="nama_customers">Nama Customers <span class="text-danger">*</span></label>
                            <input type="text" name="nama_customers" id="nama_customers" class="form-control" placeholder="Masukan Nama Customers" autocomplete="off" value="<?= set_value('nama_customers', $data->nama_customers)?>">
                            <span class="text-red"><?= form_error('nama_customers')?></span>
                        </div>
                        <div class="form-group <?= form_error('alamat_customers') ? 'has-error' : null ?>">
                            <label for="alamat_customers">Alamat Customers <span class="text-danger">*</span></label>
                            <textarea name="alamat_customers" id="alamat_customers" class="form-control" placeholder="Masukan Alamat Customers"><?= set_value('alamat_customers', $data->alamat_customers)?></textarea>
                            <span class="text-red"><?= form_error('alamat_customers')?></span>
                        </div>
                        <div class="form-group <?= form_error('no_hp') ? 'has-error' : null ?>">
                            <label for="no_hp">No Handphone <span class="text-danger">*</span></label>
                            <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Masukan No Handhone" autocomplete="off" value="<?= set_value('no_hp', $data->no_hp)?>">
                            <span class="text-red"><?= form_error('no_hp')?></span>
                        </div>
                        <div class="form-group <?= form_error('no_bangku') ? 'has-error' : null ?>">
                            <label for="no_bangku">No Bangku <span class="text-danger">*</span></label>
                            <input type="number" name="no_bangku" id="no_bangku" class="form-control" placeholder="Masukan No Bangku" autocomplete="off" value="<?= set_value('no_bangku', $data->no_bangku)?>">
                            <span class="text-red"><?= form_error('no_bangku')?></span>
                        </div>
                        <label for="kode_pesawat"> Kode Pesawat <span class="text-red">*</span></label>
                        <div class="form-group input-group <?= form_error('no_bangku') ? 'has-error' : null ?>">
                            <input type="hidden" name="id_pesawat" id="id_pesawat" value="<?= set_value('id_pesawat', $data->id_pesawat)?>">
                            <input type="text" name="kode_pesawat" id="kode_pesawat" class="form-control" value="<?= set_value('kode_pesawat', $data->kode_pesawat)?>" placeholder="-" readonly>
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <span class="text-red"><?= form_error('kode_pesawat')?></span>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama_pesawat">Nama Pesawat</label>
                                    <input type="text" name="nama_pesawat" id="nama_pesawat" class="form-control" readonly value="<?= set_value('nama_pesawat', $data->nama_pesawat)?>" placeholder="-">
                                </div>
                                <div class="col-lg-6">
                                    <label for="waktu_berangkat">Waktu Berangkat Pesawat</label>
                                    <input type="text" name="waktu_berangkat" id="waktu_berangkat" class="form-control" readonly value="<?= set_value('waktu_berangkat', $data->waktu_berangkat)?>" placeholder="-">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="keberangkatan_pesawat">Keberangkatan Pesawat</label>
                                    <input type="text" name="keberangkatan_pesawat" id="keberangkatan_pesawat" class="form-control" readonly value="<?= set_value('keberangkatan_pesawat', $data->keberangkatan_pesawat)?>" placeholder="-">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tujuan_pesawat">Tujuan Pesawat</label>
                                    <input type="text" name="tujuan_pesawat" id="tujuan_pesawat" class="form-control" readonly value="<?= set_value('tujuan_pesawat', $data->tujuan_pesawat)?>" placeholder="-">
                                </div>
                            </div>
                        </div>
                        <div class="form-group <?= form_error('harga') ? 'has-error' : null ?>">
                            <label for="harga">Harga Ticket <span class="text-danger">*</span></label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="-" readonly autocomplete="off" value="<?= set_value('harga', $data->harga)?>">
                            <span class="text-red"><?= form_error('harga')?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-warning btn-sm">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Data Pesawat</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped text-center" id="tablepesawat">
                    <thead style="background-color:#3c8dbc; color:#fff;">
                        <tr>
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
                        <?php foreach($pesawat as $data):?>
                        <tr>
                            <td><?= $data->kode_pesawat?></td>
                            <td><?= $data->nama_pesawat?></td>
                            <td><?= $data->keberangkatan_pesawat?></td>
                            <td><?= $data->tujuan_pesawat?></td>
                            <td><?= date('d-m-Y', strtotime($data->waktu_berangkat))?></td>
                            <td><?= $data->harga?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" id="select"
                                    data-id_pesawat= "<?= $data->id_pesawat?>"
                                    data-kode_pesawat= "<?= $data->kode_pesawat?>"
                                    data-nama_pesawat= "<?= $data->nama_pesawat?>"
                                    data-keberangkatan_pesawat= "<?= $data->keberangkatan_pesawat?>"
                                    data-tujuan_pesawat= "<?= $data->tujuan_pesawat?>"
                                    data-waktu_berangkat= "<?= $data->waktu_berangkat?>"
                                    data-harga= "<?= $data->harga?>"
                                    >
                                    <i class="fa fa-check"></i> Selected
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $('#tablepesawat').DataTable();
    
    $(document).on('click', '#select', function(){
        var id_pesawat = $(this).data('id_pesawat');
        var kode_pesawat = $(this).data('kode_pesawat');
        var nama_pesawat = $(this).data('nama_pesawat');
        var keberangkatan_pesawat = $(this).data('keberangkatan_pesawat');
        var tujuan_pesawat = $(this).data('tujuan_pesawat');
        var waktu_berangkat = $(this).data('waktu_berangkat');
        var harga = $(this).data('harga');

        $('#id_pesawat').val(id_pesawat);
        $('#kode_pesawat').val(kode_pesawat);
        $('#nama_pesawat').val(nama_pesawat);
        $('#keberangkatan_pesawat').val(keberangkatan_pesawat);
        $('#tujuan_pesawat').val(tujuan_pesawat);
        $('#waktu_berangkat').val(waktu_berangkat);
        $('#harga').val(harga);

        $('#modal-item').modal('hide');
    });
</script>