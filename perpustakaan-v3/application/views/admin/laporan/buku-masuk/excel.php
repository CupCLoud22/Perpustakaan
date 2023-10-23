<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Buku Masuk.xls");
?>
<div>
      <h4>LAPORAN BUKU MASUK<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small>
 <table border="1">
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
    </table>