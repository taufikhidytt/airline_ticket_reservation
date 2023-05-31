<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $judul?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('pesawat')?>"><i class="fa fa-plane"></i> Data Pesawat</a></li>
        <li class="active">Update Pesawat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <div class="pull-right">
                <a href="<?= base_url('pesawat')?>" class="btn btn-github btn-sm">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group <?= form_error('kode_pesawat') ? 'has-error' : null ?>">
                            <input type="hidden" name="id_pesawat" id="id_pesawat" value="<?= $data->id_pesawat?>">
                            <label for="kode_pesawat">Kode Pesawat <span class="text-danger">*</span></label>
                            <input type="text" name="kode_pesawat" id="kode_pesawat" class="form-control" placeholder="Masukan Kode Pesawat" autocomplete="off" value="<?= set_value('kode_pesawat', $data->kode_pesawat)?>">
                            <span class="text-red"><?= form_error('kode_pesawat')?></span>
                        </div>
                        <div class="form-group <?= form_error('nama_pesawat') ? 'has-error' : null ?>">
                            <label for="nama_pesawat">Nama Pesawat <span class="text-danger">*</span></label>
                            <input type="text" name="nama_pesawat" id="nama_pesawat" class="form-control" placeholder="Masukan Nama Pesawat Anda" autocomplete="off" value="<?= set_value('nama_pesawat', $data->nama_pesawat)?>">
                            <span class="text-red"><?= form_error('nama_pesawat')?></span>
                        </div>
                        <div class="form-group <?= form_error('keberangkatan_pesawat') ? 'has-error' : null ?>">
                            <label for="keberangkatan_pesawat">Keberangkatan Pesawat <span class="text-danger">*</span></label>
                            <input type="text" name="keberangkatan_pesawat" id="keberangkatan_pesawat" class="form-control" placeholder="Masukan Keberangkatan Pesawat" autocomplete="off" value="<?= set_value('keberangkatan_pesawat', $data->keberangkatan_pesawat)?>">
                            <span class="text-red"><?= form_error('keberangkatan_pesawat')?></span>
                        </div>
                        <div class="form-group <?= form_error('tujuan_pesawat') ? 'has-error' : null ?>">
                            <label for="tujuan_pesawat">Tujuan Pesawat <span class="text-danger">*</span></label>
                            <input type="text" name="tujuan_pesawat" id="tujuan_pesawat" class="form-control" placeholder="Masukan Tujuan Pesawat" autocomplete="off" value="<?= set_value('tujuan_pesawat', $data->tujuan_pesawat)?>">
                            <span class="text-red"><?= form_error('tujuan_pesawat')?></span>
                        </div>
                        <div class="form-group <?= form_error('waktu_berangkat') ? 'has-error' : null ?>">
                            <label for="waktu_berangkat">Waktu Berangkat Pesawat <span class="text-danger">*</span></label>
                            <input type="date" name="waktu_berangkat" id="waktu_berangkat" class="form-control" placeholder="Masukan Waktu Berangkat Pesawat" autocomplete="off" value="<?= date('Y-m-d')?>">
                            <span class="text-red"><?= form_error('waktu_berangkat')?></span>
                        </div>
                        <div class="form-group <?= form_error('harga') ? 'has-error' : null ?>">
                            <label for="harga">Harga Ticket Pesawat <span class="text-danger">*</span></label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga Ticket Pesawat Dalam Rupiah" autocomplete="off" value="<?= set_value('harga', $data->harga)?>">
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