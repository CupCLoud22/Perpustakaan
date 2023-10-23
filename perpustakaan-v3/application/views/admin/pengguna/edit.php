<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Data admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Admin</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/pengguna/edit/'.$s->id_admin, array('class' => 'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?php echo $s->id_admin ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $s->nm_admin ?>">
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo $s->email_admin ?>">
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
                        <option value="<?php echo $r['role_id'] ?>" <?php echo ($r['role_id'] == $s->role_id)? 'selected' : ''; ?>><?php echo $r['role'] ?></option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('level') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="status">
                        <option value="">-- Pilih --</option>
                        <option value="Aktif" <?php echo ($s->status_admin == 'Aktif')? 'selected' : ''; ?>>Aktif</option>
                        <option value="Tidak Aktif" <?php echo ($s->status_admin == 'Tidak Aktif')? 'selected' : ''; ?>>Tidak Aktif</option>
                      </select>
                      <small class="text-danger"><?php echo form_error('status') ?></small>
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