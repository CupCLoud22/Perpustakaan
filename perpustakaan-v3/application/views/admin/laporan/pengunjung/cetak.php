<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Pengunjung Perpustakaan</title>
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
      <h4>LAPORAN PENGUNJUNG PERPUSTAKAAN<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small><br><br>
    <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tgl Berkunjung</th><th>NIM Anggota</th><th>Nama Anggota</th><th>Jenis Kelamin</th><th>Prodi</th><th>Semester</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($tamu->num_rows() > 0){
                foreach($tamu->result() as $k){ ?>
                <tr>
                  <td><?php echo tgl_short(date('Y-m-d', strtotime($k->tgl_tamu))).' '.date('H:i:s', strtotime($k->tgl_tamu)) ?></td>
                  <td><?php echo $k->id_anggota ?></td>
                  <td><?php echo $k->nm_anggota ?></td>
                  <td><?php echo $k->jk_anggota ?></td>
                  <td><?php echo $k->nm_prodi ?></td>
                  <td><?php echo $k->smt_anggota ?></td>
                </tr>
                <?php }}else{ ?>
                <tr>
                  <td colspan="6">Tidak ada laporan</td>
                </tr>
                <?php } ?>
                <tr>
                  <td colspan="6">Total Pengunjung : <b><?php echo $tamu->num_rows(); ?></b></td>
                </tr>
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