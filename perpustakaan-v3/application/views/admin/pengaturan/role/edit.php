<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Data Role</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Data Role</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/role/edit/'.$b->role_id, array('class' => 'form-horizontal')); ?>
                  <input type="hidden" name="id" value="<?php echo $b->role_id ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Role</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="role" placeholder="Nama Role" value="<?php echo $b->role ?>">
                      <small class="text-danger"><?php echo form_error('role') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/role') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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