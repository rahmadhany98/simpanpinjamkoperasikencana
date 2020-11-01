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
        <h3 class="card-title">Angsuran Pinjaman</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Angsuran/save'); ?>">
        <div class="card-body">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No PK</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="no_rekening" data-dropdown-css-class="select2-success">
              </select>
            </div>
          </div>  
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
            <label class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" placeholder="jumlah_pinjaman" value="0" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sisa Pinjaman</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sisa_pinjaman" name="sisa_pinjaman" placeholder="sisa_pinjaman" value="0" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pokok</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['pokok']) ? 'is-invalid' : '' ?>" id="pokok" name="pokok" placeholder="" value="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Bunga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['bunga']) ? 'is-invalid' : '' ?>" id="bunga" name="bunga" placeholder="" value="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['total']) ? 'is-invalid' : '' ?>" id="total" name="total" placeholder="" value="0" readonly>
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