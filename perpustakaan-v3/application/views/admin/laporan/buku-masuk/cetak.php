<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Buku Masuk</title>
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
      <h4>LAPORAN BUKU MASUK<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small><br><br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Tanggal</th><th>Judul</th><th>Asal Buku</th><th>Keterangan</th><th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $ttl = 0;
          if($pinjam->num_rows() > 0){
            foreach($pinjam->result() as $p){
              $ttl += $p->jml_bmasuk;
        ?>
              <tr>
                <td><?php echo date('d M Y', strtotime($p->tgl_bmasuk)) ?></td>
                <td><?php echo $p->judul ?></td>
                <td><?php echo $p->asal_bmasuk ?></td>
                <td><?php echo $p->ket_bmasuk ?></td>
                <td><?php echo $p->jml_bmasuk ?></td>
              </tr>
         <?php }}else{ ?>
        <tr>
          <td colspan="5">Tidak ada laporan</td>
        </tr>
       <?php } ?>
       <tr>
         <td colspan="4">Total Buku</td>
         <td><?php echo $ttl ?></td>
       </tr>
      </tbody>
    </table><br><br>
    <div class="pull-left">
      <small>Diprint oleh : <?php echo $this->session->userdata('nm') ?><br>
      Pada tanggal : <?php echo tgl_indo(date('Y-m-d')) ?></small>
    </div>
    <div class="pull-right">
      <p>Jakarta, <?php echo tgl_indo(date('Y-m-d')) ?><br>
        Mengetahui,<br><br><br><br><br>(.....................................)</p>
    </div>
  </div>
</body>
</html>