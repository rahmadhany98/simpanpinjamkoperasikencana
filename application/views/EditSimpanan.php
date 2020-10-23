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
        <h3 class="card-title">Edit Simpanan</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Simpanan/update');?>">
        <div class="card-body">
        <input type="hidden" name="id" value="<?= $simpanan->no_rekening; ?>">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Rekening</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['no_rekening']) ? 'is-invalid':'' ?>" id="no_rekening" name="no_rekening" placeholder="No Rekening" value="<?= $simpanan->no_rekening; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Anggota</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="id_anggota" data-dropdown-css-class="select2-success">
                <option value="<?=$anggota->id;?>" selected="selected"><?=$anggota->nama;?></option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Simpanan</label>
            <div class="col-sm-10">
              <select class="form-control selectt2 select2-success" name="jenis_simpanan" data-dropdown-css-class="select2-success">
                <option value="Simpanan Wajib" <?= $simpanan->jenis_simpanan == 'Simpanan Wajib' ? 'selected':'' ?>>Simpanan Wajib</option>
                <option value="Simpanan Pokok" <?= $simpanan->jenis_simpanan == 'Simpanan Pokok' ? 'selected':'' ?>>Simpanan Pokok</option>
                <option value="Simpanan Tabungan" <?= $simpanan->jenis_simpanan == 'Simpanan Tabungan' ? 'selected':'' ?>>Simpanan Tabungan</option>
              </select>
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