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
  <?php  $this->load->view('alert'); ?>
    <!-- Default box -->
    <div class="card card-success card-outline">
      <div class="card-header">
        <h3 class="card-title">Tambah Anggota</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Anggota/save');?>">
        <div class="card-body">
        
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= $this->session->flashdata('error')['nama'] ? 'is-invalid':'' ?>" id="nama" name="nama" placeholder="Nama">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= $this->session->flashdata('error')['alamat'] ? 'is-invalid':'' ?>" id="alamat" name="alamat" placeholder="alamat">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="jenis_kelamin" data-dropdown-css-class="select2-success">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Identitas</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="jenis_identitas" data-dropdown-css-class="select2-success">
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
                <option value="passport">Passport</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Identitas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= $this->session->flashdata('error')['no_identitas'] ? 'is-invalid':'' ?>" id="no_identitas" name="no_identitas" placeholder="No Identitas">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#datetimepicker4" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control datetimepicker-input <?=$this->session->flashdata('error')['tanggal_lahir'] ? 'is-invalid':'' ?>" data-target="#datetimepicker4" name="tanggal_lahir">
              </div>
            </div>
            <!-- /.input group -->
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