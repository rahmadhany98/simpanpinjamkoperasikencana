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
        <h3 class="card-title">Mutasi Simpanan</h3>
        <form class="form-inline float-right" id="form-filter">
          <div class="card-tools mr-2">
            <select class="form-control select2 select2-success" name="no_rekening" style="width:100%" data-dropdown-css-class="select2-success">
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
              <th>Tanggal</th>
              <th>Debit</th>
              <th>Kredit</th>
              <th>Saldo Akumulasi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Debit</th>
              <th>Kredit</th>
              <th>Saldo Akumulasi</th>
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