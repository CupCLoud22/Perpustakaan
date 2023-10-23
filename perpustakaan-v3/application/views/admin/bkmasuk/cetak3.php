<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Buku Masuk Perpustakaan</title>
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
      <h4>LAPORAN BUKU MASUK PERPUSTAKAAN<br> STMIK AMIKBANDUNG</h4>
    </div>
    <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Judul Buku</th><th>Nama Supplier</th><th>Harga</th><th>Jumlah</th><th>Total Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total=0;
                if($bkmsk->num_rows() > 0){
                foreach($bkmsk->result() as $k){ 
                  $total += ($k->harga*$k->jumlah);
                ?>
                <tr>
                  <td><?php echo $k->judul ?></td>
                  <td><?php echo $k->supplier ?></td>
                  <td>Rp. <?php echo number_format($k->harga) ?></td>
                  <td><?php echo $k->jumlah ?></td>
                  <td>Rp. <?php echo number_format($k->harga*$k->jumlah)?></td>
                </tr>
                <?php }}else{ ?>
                <tr>
                  <td colspan="6">Tidak ada laporan</td>
                </tr>
                <?php } ?>
                <tr>
                  <td colspan="6" style="text-align: right;"><b>TOTAL : Rp. <?php echo number_format($total); ?></b></td>
                </tr>
                <tr>
                  <td colspan="6">Jumlah Judul Buku : <b><?php echo $bkmsk->num_rows(); ?></b></td>
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