<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Pengembalian Buku.xls");
?>
<div>
      <h4>LAPORAN PENGEMBALIAN BUKU<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small>
 <table border="1">
              <thead>
                <tr>
                  <th>Tgl Kembali</th><th>ID Pinjam</th><th>Anggota</th><th>Tgl Pinjam</th><th>Jatuh Tempo</th><th>Denda</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($kembali->num_rows() > 0){
                foreach($kembali->result() as $k){ ?>
                <tr>
                  <td><?php echo tgl_short($k->tgl_pengembalian) ?></td>
                  <td><?php echo $k->id_peminjaman ?></td>
                  <td><?php echo $k->nm_anggota ?></td>
                  <td><?php echo tgl_short($k->tgl_pinjam) ?></td>
                  <td><?php echo tgl_short($k->tgl_kembali) ?></td>
                  <td>Rp. <?php echo number_format($k->denda, 0, ',', '.') ?></td>
                </tr>
                <?php }}else{ ?>
                <tr>
                  <td colspan="6">Tidak ada laporan</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>