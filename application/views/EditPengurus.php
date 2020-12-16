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
        <h3 class="card-title">Edit Pengurus</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Pengurus/update');?>">
        <div class="card-body">
          <input type="hidden" name="id" value="<?= $anggota->id; ?>">
          <input type="hidden" name="password_lama" value="<?= $anggota->password; ?>">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['nama']) ? 'is-invalid':'' ?>" id="nama" name="nama" placeholder="Nama" value="<?= $anggota->nama; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="role" data-dropdown-css-class="select2-success">
                <option value="ketua" <?= $anggota->role == 'ketua' ? 'selected':'' ?>>Ketua Koperasi</option>
                <option value="simpanan" <?= $anggota->role == 'simpanan' ? 'selected':'' ?>>Pengurus Bagian Simpanan</option>
                <option value="kredit" <?= $anggota->role == 'kredit' ? 'selected':'' ?>>Pengurus Bagian Kredit</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['username']) ? 'is-invalid':'' ?>" id="username" name="username" placeholder="Username" value="<?=$anggota->username; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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