<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Pengunjung.xls");
?>
<div>
      <h4>LAPORAN PENGUNJUNG<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small>
  <table border="1">
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
            </table>