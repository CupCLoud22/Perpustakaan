<div id="bread">
  <div class="container">
    <p>Beranda / Area Anggota</p>
  </div>
</div>
<section id="boxCariBuku">
    <div class="container">
      <div class="section-title text-center">
        <h3>Login</h3>
        <p>Silahakan login menggunakan ID/NIM dan password Anda</p>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <?php echo $this->session->flashdata('alert') ?>
          <form action="<?php echo site_url('masuk') ?>" method="post" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-3 control-label">ID/NIM</label>
                <div class="col-sm-8">
                  <input type="text" name="nim" class="form-control" placeholder="ID/NIM" value="<?php echo set_value('nim') ?>">
                  <small class="text-danger"><?php echo form_error('nim') ?></small>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" name="pass" class="form-control" placeholder="Password">
                  <small class="text-danger"><?php echo form_error('pass') ?></small>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> Login Anggota</button>
              </div>
            </div>
          </form>
          <p class="text-center">Belum punya akun ? Silahkan <a href="<?php echo site_url('daftar') ?>">buat akun di sini</a></p>
        </div>
      </div>
    </div>
  </section>