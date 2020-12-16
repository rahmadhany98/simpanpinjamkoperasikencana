<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $header; ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <?php $this->load->view('alert'); ?>
    <!-- Default box -->
    <div class="card card-success card-outline">
      <div class="card-header">
        <h3 class="card-title">Transaksi Simpanan</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Transaksi/save_simpanan'); ?>" target="_blank">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#datetimepicker4" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control datetimepicker-input <?= isset($this->session->flashdata('error')['tanggal_transaksi']) ? 'is-invalid' : '' ?>" data-target="#datetimepicker4" name="tanggal_transaksi" value="<?=date("YYYY-mm-dd");?>">
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kode Transaksi</label>
            <div class="col-sm-10">
              <select class="form-control selectt2 select2-success" name="kode_transaksi" data-dropdown-css-class="select2-success">
                <option value="101">Setoran</option>
                <option value="102">Penarikan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Rekening</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="no_rekening" data-dropdown-css-class="select2-success">
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Saldo Awal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="saldo_awal" name="saldo_awal" placeholder="saldo awal" value="0" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nilai Transaksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['transaksi']) ? 'is-invalid' : '' ?>" id="transaksi" name="transaksi" placeholder="" value="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Saldo Akhir</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['saldo_akhir']) ? 'is-invalid' : '' ?>" id="saldo_akhir" name="saldo_akhir" placeholder="saldo akhir" value="0" readonly>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->