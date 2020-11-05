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
        <h3 class="card-title">Detail Pinjaman</h3>

        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <dl>
              <dt>No PK</dt>
              <dd><?= $pinjaman->no_pk; ?></dd>
              <dt>Nama</dt>
              <dd><?= $pinjaman->nama_debitor; ?></dd>
              <dt>Alamat</dt>
              <dd><?= $pinjaman->alamat; ?></dd>
              <dt>Jumlah Pinjam</dt>
              <dd><?= $pinjaman->jumlah_pinjam; ?></dd>
              <dt>Lama Pinjam</dt>
              <dd><?= $pinjaman->lama_pinjam; ?> Bulan</dd>
            </dl>
          </div>
          <div class="col-sm-6">
            <dl>
              <dt>Tanggal Realisasi</dt>
              <dd><?= $pinjaman->tanggal_realisasi; ?></dd>
              <dt>Tanggal Jatuh Tempo</dt>
              <dd><?= $pinjaman->tanggal_jatuh_tempo; ?></dd>
              <dt>Jaminan</dt>
              <dd><?= $pinjaman->jaminan; ?></dd>
              <dt>No Telepon</dt>
              <dd><?= $pinjaman->no_hp; ?></dd>
              <dt>Status</dt>
              <dd><?= $pinjaman->status; ?></dd>
            </dl>
          </div>
        </div>
        <div class="col-sm-12">
          <h4>Riwayat Angsuran</h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Transaksi</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($detail as $det) { ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $det->tanggal_transaksi; ?></td>
                <td><?= $det->kredit; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
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