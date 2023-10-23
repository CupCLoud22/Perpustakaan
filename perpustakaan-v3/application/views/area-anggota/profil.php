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
            <div class="panel-heading">Profil Anda</div>
            <div class="panel-body">
              <?php echo $this->session->flashdata('alert') ?>
              <form action="<?php echo site_url('area_anggota/profil') ?>" method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID/NIM</label>
                    <div class="col-sm-5">
                      <input type="text" name="nim" class="form-control" placeholder="ID/NIM" value="<?php echo $p->id_anggota ?>" readonly>
                      <small class="text-danger"><?php echo form_error('nim'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $p->nm_anggota ?>">
                      <small class="text-danger"><?php echo form_error('nama'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Prodi</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="prodi">
                        <option value="">--Pilih--</option>
                        <?php foreach($prodi->result() as $s){ ?>
                          <option value="<?php echo $s->id_prodi ?>" <?php echo ($p->id_prodi == $s->id_prodi)? 'selected':''; ?>><?php echo $s->nm_prodi ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('prodi'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Semester</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="smt">
                        <option value="">--Pilih--</option>
                        <?php for($i=1; $i<= 12; $i++){ ?>
                          <option value="<?php echo $i ?>" <?php echo ($p->smt_anggota == $i)? 'selected':''; ?>><?php echo $i ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('smt'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <label class="radio-inline">
                        <input type="radio" name="jk" value="Laki-laki" <?php echo ($p->jk_anggota == 'Laki-laki')? 'checked':''; ?>> Laki-laki
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="jk" value="Perempuan" <?php echo ($p->jk_anggota == 'Perempuan')? 'checked':''; ?>> Perempuan
                      </label>
                      <small class="text-danger"><?php echo form_error('jk'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo $p->almt_anggota ?></textarea>
                      <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-7">
                      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $p->email_anggota ?>">
                      <small class="text-danger"><?php echo form_error('email'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">No. Hp</label>
                    <div class="col-sm-5">
                      <input type="text" name="hp" class="form-control" placeholder="No. Hp" value="<?php echo $p->hp_anggota ?>">
                      <small class="text-danger"><?php echo form_error('hp'); ?></small>
                    </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="pass1" class="form-control" placeholder="Password">
                      <small class="text-danger"><?php echo form_error('pass1'); ?></small>
                      <small>Kosongkan password jika tidak ingin mengubahnya</small>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Konfirmasi Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="pass2" class="form-control" placeholder="Konfirmasi Password">
                      <small class="text-danger"><?php echo form_error('pass2'); ?></small>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Akun</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>