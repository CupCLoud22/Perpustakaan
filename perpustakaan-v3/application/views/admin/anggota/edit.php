<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Data Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Anggota</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/anggota/edit/'.$s->id_anggota, array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID Anggota</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="id" value="<?php echo $s->id_anggota ?>" readonly>
                      <small class="text-danger"><?php echo form_error('id') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $s->nm_anggota ?>">
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Prodi</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="prodi">
                        <option value="">--Pilih--</option>
                        <?php foreach($prodi->result() as $p){ ?>
                          <option value="<?php echo $p->id_prodi ?>" <?php echo ($s->id_prodi == $p->id_prodi)? 'selected':''; ?>><?php echo $p->nm_prodi ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('prodi'); ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Semester</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="smt">
                        <option value="">--Pilih--</option>
                        <?php for($i=1; $i<= 12; $i++){ ?>
                          <option value="<?php echo $i ?>" <?php echo ($s->smt_anggota == $i)? 'selected':''; ?>><?php echo $i ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('smt'); ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                       <label>
                          <input type="radio" name="jk" value="Laki-laki" <?php echo ($s->jk_anggota == 'Laki-laki')? 'checked' : ''; ?>> Laki-laki
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="jk" value="Perempuan" <?php echo ($s->jk_anggota == 'Perempuan')? 'checked' : ''; ?>> Perempuan
                        </label>
                        <small class="text-danger"><?php echo form_error('jk') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?php echo $s->almt_anggota ?></textarea>
                      <small class="text-danger"><?php echo form_error('alamat') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $s->email_anggota ?>">
                      <small class="text-danger"><?php echo form_error('email') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No Hp</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="hp" placeholder="No Hp" value="<?php echo $s->hp_anggota ?>">
                      <small class="text-danger"><?php echo form_error('hp') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/anggota') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->