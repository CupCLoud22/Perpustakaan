<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah Data admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Admin</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/pengguna/add', array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>">
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo set_value('email') ?>">
                      <small class="text-danger"><?php echo form_error('email') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="level">
                        <option value="">-- Pilih --</option>
                        <?php 
                          foreach($role->result_array() as $r){
                        ?>
                        <option value="<?php echo $r['role_id'] ?>" <?php echo ($r['role_id'] == set_value('level'))? 'selected': ''; ?>><?php echo $r['role'] ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('level') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="pass1" placeholder="Password" value="<?php echo set_value('pass1') ?>">
                      <small class="text-danger"><?php echo form_error('pass1') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Konfirmasi Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="pass2" placeholder="Konfirmasi Password" value="<?php echo set_value('pass2') ?>">
                      <small class="text-danger"><?php echo form_error('pass2') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/pengguna') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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