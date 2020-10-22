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
        <h3 class="card-title">Daftar Simpanan</h3>
        <form class="form-inline float-right" id="form-filter">
          <div class="card-tools mr-2">
          <select name="jenis_simpanan" id="jenis_simpanan" class="form-control">
              <option value="">Pilih Jenis SImpanan</option>
              <option value="Simpanan Wajib">Simpanan Wajib</option>
              <option value="Simpanan Pokok">Simpanan Pokok</option>
              <option value="Simpanan Tabungan">Simpanan Tabungan</option>
            </select>
          </div>
          <div class="card-tools">
          <button type="button" id="btn-filter" class="btn btn-block btn-success btn-sm">Submit</button>
          </div>
        </form>
      </div>
      <div class="card-body">
        <table id="table-1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>No Rekening</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>No Rekening</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-2 float-right">
      <a href="<?= base_url('Simpanan/add') ?>" class="btn btn-block btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Simpanan</a>
      </div>  
    </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->