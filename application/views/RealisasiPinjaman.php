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
        <h3 class="card-title">Realisasi Pinjaman</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Realisasi/save'); ?>">
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Debitor</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="nama_debitor" data-dropdown-css-class="select2-success">
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jaminan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jaminan" name="jaminan" placeholder="jaminan" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Hp</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="no_hp" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jumlah Pinjam</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" placeholder="jumlah_pinjam" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Lama Pinjam (Bulan)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="lama_pinjam" name="lama_pinjam" placeholder="lama_pinjam" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Realisasi</label>
            <div class="col-sm-10">
              <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#datetimepicker4" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" id="datetimepickerrr" class="form-control datetimepicker-input <?= isset($this->session->flashdata('error')['tanggal_realisasi']) ? 'is-invalid' : '' ?>" data-target="#datetimepicker4" name="tanggal_realisasi">
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Jatuh Tempo</label>
            <div class="col-sm-10">
              <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#datetimepicker3" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" id="datetimepickerr" class="form-control datetimepicker-input <?= isset($this->session->flashdata('error')['tanggal_jatuh_tempo']) ? 'is-invalid' : '' ?>" data-target="#datetimepicker3" name="tanggal_jatuh_tempo">
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No PK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['no_pk']) ? 'is-invalid' : '' ?>" id="no_pk" name="no_pk" placeholder="no pk">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Biaya Admin</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="biaya_admin" name="biaya_admin" placeholder="" value="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Biaya Materai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="materai" name="materai" placeholder="" value="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Total Realisasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="total_realisasi" name="total_realisasi" placeholder="total_realisasi" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Angsuran Pokok</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="angsuran_pokok" name="angsuran_pokok" placeholder="angsuran_pokok" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Bunga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="bunga" name="bunga" placeholder="bunga" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Total Angsuran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="total_angsuran" name="total_angsuran" placeholder="total_angsuran" readonly>
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