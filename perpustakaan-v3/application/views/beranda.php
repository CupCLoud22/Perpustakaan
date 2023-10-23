<div id="banner">
  <div class="container">
    <h2>SELAMAT DATANG</h2>
    <p><b>Di Perpustakaan STMIK “AMIKBANDUNG”</b></p>
    <p>Absen Pengunjung Perpustakaan Disini</p>
    <a href="<?php echo site_url('absensi') ?>" class="btn btn-primary"><i class="fa fa-check"></i> Absen</a>
  </div>
</div>
  <section id="boxCariBuku">
    <div class="container text-center">
      <div class="section-title">
        <h3>Cari Katalog Buku</h3>
        <p>Silahkan cari katalog buku yang Anda butuhkan</p>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form action="<?php echo site_url('koleksi') ?>">
            <div class="form-group">
            <input type="text" class="form-control" name="key" placeholder="Masukkan kata kunci">
            </div>
            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari Katalog</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="boxTerbaru">
    <div class="container text-center">
      <div class="section-title">
        <h3>Koleksi Buku Terbaru</h3>
        <p>Silahkan pilih koleksi buku terbaru kami</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          
          <section class="autoplay slider">
            <?php foreach($buku->result() as $b){ ?>
              <div class="box-thumb"><a href="<?php echo site_url('koleksi/detail/'.$b->id_buku) ?>" title="<?php echo $b->judul ?>"><img src="<?php echo ($b->gambar != '') ? base_url('buku/'.$b->gambar) : base_url('assets/dist/img/thumb.png') ?>" alt="<?php echo $b->judul ?>"></a></div>
            <?php } ?>
          </section>

        </div>
      </div>
    </div>
  </section>