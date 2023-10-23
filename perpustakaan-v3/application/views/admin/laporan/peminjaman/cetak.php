<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Peminjaman buku perpustakaan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style>
    .page-header h4 {
      line-height: 25px;
    }
  </style>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      window.print();
    });
  </script>
</head>
<body>
  <div class="container">
    <div class="page-header text-center">
      <h4>LAPORAN PEMINJAMAN BUKU PERPUSTAKAAN<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small><br><br>
    <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th><th>Tgl Pinjam</th><th>Jatuh Tempo</th><th>NIM</th><th>Nama Anggota</th><th>Jenis Kelamin</th><th>Prodi</th><th>Semester</th><th>Status</th><th>Katerangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($pinjam->num_rows() > 0){
                foreach($pinjam->result() as $p){ ?>
                <tr>
                  <td><?php echo $p->id_peminjaman ?></td>
                  <td><?php echo date('d M Y', strtotime($p->tgl_pinjam)) ?></td>
                  <td><?php echo date('d M Y', strtotime($p->tgl_kembali)) ?></td>
                  <td><?php echo $p->id_anggota ?></td>
                  <td><?php echo $p->nm_anggota ?></td>
                  <td><?php echo $p->jk_anggota ?></td>
                  <td><?php echo $p->nm_prodi ?></td>
                  <td><?php echo $p->smt_anggota ?></td>
                  <td><?php echo $p->status ?></td>
                  <td><?php echo $p->keterangan ?></td>
                </tr>
                <?php }}else{ ?>
                <tr>
                  <td colspan="10">Tidak ada laporan</td>
                </tr>
                <?php } ?>
              </tbody>
            </table><br><br>
    <div class="pull-left">
      <small>Diprint oleh : <?php echo $this->session->userdata('nm') ?><br>
      Pada tanggal : <?php echo tgl_indo(date('Y-m-d')) ?></small>
    </div>
    <div class="pull-right">
      <p>Bandung, <?php echo tgl_indo(date('Y-m-d')) ?><br>
        Mengetahui,<br><br><br><br><br>(.....................................)</p>
    </div>
  </div>
</body>
</html>