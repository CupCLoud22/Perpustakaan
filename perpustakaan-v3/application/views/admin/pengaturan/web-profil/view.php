<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profil Website</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profil Website</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/wp', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                  <input type="hidden" name="id" value="<?php echo $s->wp_id ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Favicon</label>
                    <div class="col-sm-5">
                      <img src="<?php echo base_url('assets/dist/img/'.$s->wp_favicon) ?>" style="padding:3px;border:1px solid #ccc;margin-bottom:5px;">
                      <input type="hidden" class="form-control" name="fav2" value="<?php echo $s->wp_favicon ?>">
                      <input type="file" class="form-control" name="fav">
                      <small class="text-danger"><?php echo form_error('fav') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Logo</label>
                    <div class="col-sm-5">
                      <img src="<?php echo base_url('assets/dist/img/'.$s->wp_logo) ?>" style="padding:3px;border:1px solid #ccc;margin-bottom:5px;">
                      <input type="hidden" class="form-control" name="logo2" value="<?php echo $s->wp_logo ?>">
                      <input type="file" class="form-control" name="logo">
                      <small class="text-danger"><?php echo form_error('logo') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Judul Web</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="judul" placeholder="Judul Web" value="<?php echo $s->wp_judul ?>">
                      <small class="text-danger"><?php echo form_error('judul') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Instansi</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Instansi" value="<?php echo $s->wp_nama ?>">
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat Lengkap</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" value="<?php echo $s->wp_alamat ?>">
                      <small class="text-danger"><?php echo form_error('alamat') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Telp.</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="telp" placeholder="Telp" value="<?php echo $s->wp_telp ?>">
                      <small class="text-danger"><?php echo form_error('telp') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. Hp</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="hp" placeholder="No Hp" value="<?php echo $s->wp_hp ?>">
                      <small class="text-danger"><?php echo form_error('hp') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $s->wp_email ?>">
                      <small class="text-danger"><?php echo form_error('email') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check"></i> Submit</button>
                    </div>
                  </div>
                <?php echo form_close(); ?><br>
                <?php echo $this->session->flashdata('alert') ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->