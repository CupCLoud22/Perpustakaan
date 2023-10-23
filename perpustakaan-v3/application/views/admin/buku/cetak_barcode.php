<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Barcode</title>
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
  <div class="container-fluid">
    <h3>Barcode</h3>
    <div class="row">
      <?php foreach($bar->result_array() as $b){ ?>
      <div style="text-align:center;display: inline-block;margin-bottom: 50px;">
        <?php 
        echo '<img src="'.base_url().'qrcode/'.$b['id_buku'].'.png" />';
         ?>
          <br><b><?php echo $b['id_buku'] ?></b>
      </div>
     <?php } ?>
    </div>
  </div>
</body>
</html>