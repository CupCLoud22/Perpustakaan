<div id="bread">
  <div class="container">
    <p>Beranda / Area Anggota</p>
  </div>
</div>
<section id="boxTerbaru">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <?php $this->load->view('area-anggota/menu_anggota') ?>
        </div>
        <div class="col-md-9 col-sm-9">
          <div class="panel panel-default">
            <div class="panel-heading">Detail Riwayat Peminjaman Buku Anda</div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>ISBN</th>
                    <th>Qty</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $ttl = 0;
                    foreach ($l as $n) {
                      $ttl += $n->qty;
                  ?>
                  <tr>
                    <td><?php echo $n->id_buku ?></td>
                    <td><?php echo $n->judul ?></td>
                    <td><?php echo $n->pengarang?></td>
                    <td><?php echo $n->isbn ?></td>
                    <td><?php echo $n->qty ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="4">Total Buku</th><th><?php echo $ttl ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <a href="<?php echo site_url('area_anggota/riwayat') ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
              <?php if($p->status == 'Menunggu Verifikasi'){ ?>
                <div class="alert alert-warning" style="margin-top:10px;">Status peminjaman Anda belum diverifikasi, harap menghubungi petugas perpustakaan untuk melakukan verifikasi data.</div>
            <?php }elseif($p->status == 'Kembali'){ ?>
              <div class="alert alert-success" style="margin-top:10px;">Peminjaman buku telah selesai, terima kasih telah melakukan peminjaman buku di perpustakaan ini.</div>
            <?php }elseif($p->perpanjang == 0){ ?>
              <a href="<?php echo site_url('area_anggota/perpanjang/'.$this->uri->segment(3)) ?>" onclick="return confirm('Yakin ingin perpanjang periode peminjaman buku ini ?')" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Perpanjang</a>
            <?php }elseif($p->perpanjang != 0){ ?>
              <div class="alert alert-info" style="margin-top:10px;">Anda telah melakukan perpanjangan waktu peminjaman buku ini.</div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>