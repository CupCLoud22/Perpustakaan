<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Peminjaman Buku.xls");
?>
<div>
      <h4>LAPORAN PEMINJAMAN BUKU<br> <?php echo $wp->wp_nama ?></h4>
    </div>
    <small>Dari Tanggal <?php echo tgl_indo($this->input->get('tgl1')) ?> s/d <?php echo tgl_indo($this->input->get('tgl2')) ?></small>
 <table border="1">
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
            </table>