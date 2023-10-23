<html>
<head>
  <title>Laporan Buku Keluar</title>
</head>
<body>

  <?php 
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Laporan Buku Keluar.xls");
  ?>
  <div>
        <h4>LAPORAN BUKU KELUAR<br> <?php echo $wp->wp_nama ?></h4>
      </div>
      <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small>
  <table border="1">
        <thead>
          <tr>
            <th>Tanggal</th><th>Judul</th><th>Keterangan</th><th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $ttl = 0;
            if($bkeluar->num_rows() > 0){
              foreach($bkeluar->result() as $p){
                $ttl += $p->jml_bkeluar;
          ?>
                <tr>
                  <td><?php echo date('d M Y', strtotime($p->tgl_bkeluar)) ?></td>
                  <td><?php echo $p->judul ?></td>
                  <td><?php echo $p->ket_bkeluar ?></td>
                  <td><?php echo $p->jml_bkeluar ?></td>
                </tr>
           <?php }}else{ ?>
          <tr>
            <td colspan="4">Tidak ada laporan</td>
          </tr>
         <?php } ?>
         <tr>
           <td colspan="3">Total Buku</td>
           <td><?php echo $ttl ?></td>
         </tr>
        </tbody>
      </table>

</body>
</html>