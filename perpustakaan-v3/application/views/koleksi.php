<div id="bread">
  <div class="container">
    <p>Beranda / Katalog Buku</p>
  </div>
</div>
<section id="boxCariBuku">
    <div class="container">
      <div class="section-title text-center">
        <h3>Cari Katalog Buku</h3>
        <p>Silahkan cari katalog buku yang Anda butuhkan</p>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
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
  <div class="container">
  <h4>List Katalog Buku</h4><hr>
      <?php 
        if($buku->num_rows() > 0){
          foreach($buku->result() as $b){
      ?>
      <div class="katalog-box">
        <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-3">
                      <img src="<?php echo ($b->gambar != '') ? base_url('buku/'.$b->gambar) : base_url('assets/dist/img/thumb.png') ?>" width="100px">
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-9">
                      <h4><a href="<?php echo site_url('koleksi/detail/'.$b->id_buku) ?>"><?php echo $b->judul ?></a></h4>
                      Pengarang : <?php echo $b->pengarang ?><br>
                      ISBN : <?php echo $b->isbn ?><br>
                      <label class="label label-danger"><i class="fa fa-tags"></i> <?php echo $b->nm_kategori ?></label>
                    </div>
                  </div>
      </div>
      <?php }}else{ ?>
        <div class="alert alert-danger">Buku yang Anda cari tidak ditemukan</div>
      <?php } ?>
      <?php echo $link ?>
  </div>
</section>