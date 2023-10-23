<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profil</h3>
        </div>
        <div class="box-body">
          <div class="alert alert-info">
            Jika tidak ingin mengubah password, kosongkan saja kolom password dan konfirmasi password di bawah ini.
          </div>
                <?php echo form_open('admin/profil/', array('class' => 'form-horizontal')); ?>
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
                      <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $s->email_admin ?>">
                      <small class="text-danger"><?php echo form_error('email') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="pass1" placeholder="Password">
                      <small class="text-danger"><?php echo form_error('pass1') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Konfirmasi Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" name="pass2" placeholder="Konfirmasi Password">
                      <small class="text-danger"><?php echo form_error('pass2') ?></small>
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