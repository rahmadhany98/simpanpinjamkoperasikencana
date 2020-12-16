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
        <h3 class="card-title">Detail Pengajuan</h3>

        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <dl>
              <dt>Nama</dt>
              <dd><?= $detail->nama; ?></dd>
              <dt>No Telepon</dt>
              <dd><?= $detail->no_telepon; ?></dd>
              <dt>Alamat</dt>
              <dd><?= $detail->alamat; ?></dd>
              <dt>Umur</dt>
              <dd><?= $detail->umur; ?></dd>
              <dt>No Identitas</dt>
              <dd><?= $detail->no_identitas; ?></dd>
              <dt>Pekerjaan</dt>
              <dd><?= $detail->pekerjaan; ?></dd>
              <dt>Tujuan</dt>
              <dd><?= $detail->tujuan; ?></dd>
              <dt>Jaminan</dt>
              <dd><?= $detail->jaminan; ?></dd>
              <dt>Foto Jaminan</dt>
              <dd><img src="<?= base_url('upload/pengajuan/' . $detail->foto_jaminan); ?>" height="200px" width="200px"></dd>
              <dt>Foto KK</dt>
              <dd><img src="<?= base_url('upload/pengajuan/' . $detail->foto_kk); ?>" height="200px" width="200px"></dd>
            </dl>
          </div>
          <div class="col-sm-6">
            <dl>
              <dt>Tanggal Pengajuan</dt>
              <dd><?= $detail->tanggal; ?></dd>
              <dt>No Tabungan</dt>
              <dd><?= $detail->no_buku_tabungan; ?></dd>
              <dt>Jumlah Pinjam</dt>
              <dd><?= $detail->jumlah_pinjam; ?></dd>
              <dt>Lama Pinjam</dt>
              <dd><?= $detail->lama_pinjam; ?> Bulan</dd>
              <dt>Nama Penjamin</dt>
              <dd><?= $detail->nama_penjamin; ?></dd>
              <dt>Alamat Penjamin</dt>
              <dd><?= $detail->alamat_penjamin; ?></dd>
              <dt>No Telepon Penjamin</dt>
              <dd><?= $detail->no_telepon_penjamin; ?></dd>
              <dt>Status</dt>
              <dd><?= $detail->status; ?></dd>
              <dt>Foto KTP</dt>
              <dd><img src="<?= base_url('upload/pengajuan/' . $detail->foto_ktp); ?>" height="200px" width="200px"></dd>
            </dl>
          </div>
        </div>
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