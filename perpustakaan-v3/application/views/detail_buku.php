<div id="bread">
  <div class="container">
    <p>Beranda / Detail Buku</p>
  </div>
</div>

<section id="boxDetailBuku">
  <div class="container">
    
    <div class="section-title text-center">
      <h3>Detail Buku Pilihan Anda</h3>
      <p>Silahkan cek detail buku yang Anda pilih</p>
    </div>
    <div class="row">
      <div class="col-md-4 detail-gambar">
        <img src="<?php echo ($b->gambar != '') ? base_url('buku/'.$b->gambar) : base_url('assets/dist/img/thumb.png') ?>">
      </div>
      <div class="col-md-8">
        
        <h3><?php echo $b->judul ?></h3>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <td>Pengarang</td><td>: <?php echo $b->pengarang ?></td>
            </tr>
            <tr>
              <td>ISBN</td><td>: <?php echo $b->isbn ?></td>
            </tr>
            <tr>
              <td>Tahun Terbit</td><td>: <?php echo $b->thn_terbit ?></td>
            </tr>
            <tr>
              <td>Kategori</td><td>: <label class="label label-danger"><i class="fa fa-tags"></i> <?php echo $b->nm_kategori ?></label></td>
            </tr>
            <tr>
              <td>Rak</td><td>: <?php echo $b->nm_rak.' ['.$b->ket_rak.']' ?></td>
            </tr>
            <tr>
              <td>Penerbit</td><td>: <?php echo $b->nm_penerbit ?></td>
            </tr>
            <tr>
              <td>Jumlah Buku</td><td>: <?php echo $b->jumlah ?></td>
            </tr>
            <tr>
              <td>Sinopsis</td><td>: <?php echo $b->sinopsis ?></td>
            </tr>
          </table>
        </div>
        <b>Download e-book di sini</b><br>
          <?php if($b->ebook != ''){ ?>
           <a href="<?php echo site_url('koleksi/download_ebook/'.$b->ebook) ?>"><?php echo $b->judul ?></a>
          <?php }else{ ?>
            <div class="alert alert-danger">Buku ini tidak mempunyai e-book</div>
          <?php } ?>
      </div>
    </div>
  </div>
</section>