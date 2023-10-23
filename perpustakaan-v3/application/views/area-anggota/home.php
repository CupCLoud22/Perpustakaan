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
            <div class="panel-heading">Beranda Anggota</div>
            <div class="panel-body">
              <div class="alert alert-success">
                <b>Selamat Datang, <?php echo $p->nm_anggota ?>!</b>
              </div>
              <br><br><br><br><br>
              <h4>Catatan :</h4>
              <ol>
                <li>Anda dapat melakukan peminjaman buku dengan tempo yang sudah ditentukan.</li>
                <li>Anda dapat melakukan perpanjangan tempo peminjaman buku sebanyak 1 (satu) kali, dengan tempo yang sudah ditentukan.</li>
                <li>Saat melakukan pengembalian buku, harap mengembalikan buku sesuai dengan buku yang dipinjam di awal.</li>
                <li>Harap jaga buku dengan baik saat dibawa pulang ke rumah.</li>
              </ol>
              <p>Terima kasih,</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>