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
        <h3 class="card-title">Daftar Pinjaman</h3>

        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <table id="table-1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>No PK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jumlah Pinjam</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>No PK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jumlah Pinjam</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->