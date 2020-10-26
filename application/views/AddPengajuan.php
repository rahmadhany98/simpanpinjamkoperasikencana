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
        <h3 class="card-title">Tambah Pengajuan</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?= base_url('Pengajuan/save'); ?>" enctype="multipart/form-data">
        <div class="card-body">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#datetimepicker4" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control datetimepicker-input <?= isset($this->session->flashdata('error')['tanggal']) ? 'is-invalid' : '' ?>" data-target="#datetimepicker4" name="tanggal">
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['nama']) ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Nama">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No identitas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['no_identitas']) ? 'is-invalid' : '' ?>" id="no_identitas" name="no_identitas" placeholder="no_identitas">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Rekening</label>
            <div class="col-sm-10">
              <select class="form-control select2 select2-success" name="no_buku_tabungan" data-dropdown-css-class="select2-success">
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['alamat']) ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="alamat">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No telepon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['no_telepon']) ? 'is-invalid' : '' ?>" id="no_telepon" name="no_telepon" placeholder="no_telepon">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Umur</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['umur']) ? 'is-invalid' : '' ?>" id="umur" name="umur" placeholder="umur">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pekerjaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['pekerjaan']) ? 'is-invalid' : '' ?>" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jumlah Pinjam</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['jumlah_pinjam']) ? 'is-invalid' : '' ?>" id="jumlah_pinjam" name="jumlah_pinjam" placeholder="jumlah_pinjam">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Lama Pimjam (Bulan)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['lama_pinjam']) ? 'is-invalid' : '' ?>" id="lama_pinjam" name="lama_pinjam" placeholder="lama_pinjam">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tujuan Penggunaan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['tujuan']) ? 'is-invalid' : '' ?>" id="tujuan" name="tujuan" placeholder="tujuan">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jaminan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['jaminan']) ? 'is-invalid' : '' ?>" id="jaminan" name="jaminan" placeholder="jaminan">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Foto Jaminan</label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto_jaminan" name="foto_jaminan">
                <label class="custom-file-label" for="customFile">Pilih file</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Foto KTP</label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto_ktp" name="foto_ktp">
                <label class="custom-file-label" for="customFile">Pilih file</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Foto KK</label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto_kk" name="foto_kk">
                <label class="custom-file-label" for="customFile">Pilih file</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Penjamin</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['nama_penjamin']) ? 'is-invalid' : '' ?>" id="nama_penjamin" name="nama_penjamin" placeholder="nama_penjamin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat Penjamin</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['alamat_penjamin']) ? 'is-invalid' : '' ?>" id="alamat_penjamin" name="alamat_penjamin" placeholder="alamat_penjamin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Telepon Penjamin</label>
            <div class="col-sm-10">
              <input type="text" class="form-control <?= isset($this->session->flashdata('error')['no_telepon_penjamin']) ? 'is-invalid' : '' ?>" id="no_telepon_penjamin" name="no_telepon_penjamin" placeholder="no_telepon_penjamin">
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