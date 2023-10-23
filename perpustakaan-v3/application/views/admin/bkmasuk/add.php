<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah Data Buku Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Buku Masuk</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/bkmasuk/add', array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="<?php echo set_value('judul') ?>">
                      <small class="text-danger"><?php echo form_error('judul') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Supplier</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="supplier" placeholder="Supplier" value="<?php echo set_value('supplier') ?>">
                      <small class="text-danger"><?php echo form_error('supplier') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Harga</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?php echo set_value('harga') ?>">
                      <small class="text-danger"><?php echo form_error('harga') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Buku</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Buku" value="<?php echo set_value('jumlah') ?>">
                      <small class="text-danger"><?php echo form_error('jumlah') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/bkmasuk') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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