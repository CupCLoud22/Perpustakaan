  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Detail Peminjaman Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Detail
            <small class="pull-right">Tgl Pinjam : <?php echo tgl_short($p->tgl_pinjam) ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Peminjam
          <address>
            <strong><?php echo $p->nm_anggota.' ['.$p->id_anggota.']' ?><br>
            <?php echo $p->almt_anggota ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>#<?php echo $p->id_peminjaman ?></b> <br>
          <b>Jatuh Tempo :</b> <?php echo tgl_short($p->tgl_kembali); ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead class="bg-success">
            <tr>
              <th>ID Buku</th>
              <th>Judul</th>
              <th>Pengarang</th>
              <th>ISBN</th>
              <th>Qty</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              $ttl = 0;
              foreach ($l as $n) {
                $ttl += $n->qty;
            ?>
            <tr>
              <td><?php echo $n->id_buku ?></td>
              <td><?php echo $n->judul ?></td>
              <td><?php echo $n->pengarang?></td>
              <td><?php echo $n->isbn ?></td>
              <td><?php echo $n->qty ?></td>
            </tr>
            <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4">Total Buku</th><th><?php echo $ttl ?></th>
              </tr>
            </tfoot>
          </table>
          <b>Keterangan:</b><br><?php echo $p->keterangan ?><br><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo site_url('admin/peminjaman') ?>" class="btn btn-default btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Kembali</a>
          <?php if($p->status == 'Menunggu Verifikasi'){ ?>
          <a href="<?php echo site_url('admin/peminjaman/verifikasi/'.$p->id_peminjaman) ?>" onclick="return confirm('Yakin ingin verifikasi peminjaman ini ?')" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Verifikasi Peminjaman</a>
        <?php } ?>
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->