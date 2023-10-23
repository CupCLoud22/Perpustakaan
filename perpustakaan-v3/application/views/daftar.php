<div id="bread">
  <div class="container">
    <p>Beranda / Buat Akun Keanggotaan</p>
  </div>
</div>
<section id="boxCariBuku">
    <div class="container">
      <div class="section-title text-center">
        <h3>Buat Akun Keanggotaan</h3>
        <p>Silahakan isi data Anda di bawah ini</p>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-1">
          <div class="welcome"></div>
          <form action="<?php echo site_url('daftar') ?>" method="post" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-4 control-label">ID/NIM</label>
                <div class="col-sm-5">
                  <input type="text" name="nim" class="form-control" placeholder="ID/NIM" value="<?php echo set_value('nim') ?>">
                  <small class="text-danger"><?php echo form_error('nim'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Nama Lengkap</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>">
                  <small class="text-danger"><?php echo form_error('nama'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Prodi</label>
                <div class="col-sm-7">
                  <select class="form-control" name="prodi">
                    <option value="">--Pilih--</option>
                    <?php foreach($prodi->result() as $p){ ?>
                      <option value="<?php echo $p->id_prodi ?>" <?php echo (set_value('prodi') == $p->id_prodi)? 'selected':''; ?>><?php echo $p->nm_prodi ?></option>
                    <?php } ?>
                  </select>
                  <small class="text-danger"><?php echo form_error('prodi'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Semester</label>
                <div class="col-sm-4">
                  <select class="form-control" name="smt">
                    <option value="">--Pilih--</option>
                    <?php for($i=1; $i<= 12; $i++){ ?>
                      <option value="<?php echo $i ?>" <?php echo (set_value('smt') == $i)? 'selected':''; ?>><?php echo $i ?></option>
                    <?php } ?>
                  </select>
                  <small class="text-danger"><?php echo form_error('smt'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                  <label class="radio-inline">
                    <input type="radio" name="jk" value="Laki-laki" <?php echo (set_value('jk') == 'Laki-laki')? 'checked':''; ?>> Laki-laki
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="jk" value="Perempuan" <?php echo (set_value('jk') == 'Perempuan')? 'checked':''; ?>> Perempuan
                  </label>
                  <small class="text-danger"><?php echo form_error('jk'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-8">
                  <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
                  <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Email</label>
                <div class="col-sm-7">
                  <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>">
                  <small class="text-danger"><?php echo form_error('email'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">No. Hp</label>
                <div class="col-sm-5">
                  <input type="text" name="hp" class="form-control" placeholder="No. Hp" value="<?php echo set_value('hp') ?>">
                  <small class="text-danger"><?php echo form_error('hp'); ?></small>
                </div>
            </div>
             <div class="form-group">
              <label class="col-sm-4 control-label">Password</label>
                <div class="col-sm-6">
                  <input type="password" name="pass1" class="form-control" placeholder="Password">
                  <small class="text-danger"><?php echo form_error('pass1'); ?></small>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Konfirmasi Password</label>
                <div class="col-sm-6">
                  <input type="password" name="pass2" class="form-control" placeholder="Konfirmasi Password">
                  <small class="text-danger"><?php echo form_error('pass2'); ?></small>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-10">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Buat Akun</button>
              </div>
            </div>
          </form>
          <p class="text-center">Sudah punya akun ? Silahkan <a href="<?php echo site_url('masuk') ?>">login di sini</a></p>
        </div>
      </div>
    </div>
  </section>