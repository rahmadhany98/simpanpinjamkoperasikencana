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
        <h3 class="card-title">Daftar Transaksi Simpanan</h3>
        <form class="form-inline float-right" id="form-filter">
          <div class="card-tools mr-2">
            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
              <div class="input-group-prepend" data-target="#datetimepicker4" data-toggle="datetimepicker">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="start_date" id="start_date" value="<?= date("Y-m-d"); ?>">
            </div>
          </div>
          <div class="card-tools mr-2">
          <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
              <div class="input-group-prepend" data-target="#datetimepicker5" data-toggle="datetimepicker">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker5" name="end_date" id="end_date" value="<?= date("Y-m-d"); ?>">
            </div>
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
              <th>No Rekening</th>
              <th>Debit</th>
              <th>Kredit</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2"></th>
              <th></th>
              <th></th>
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