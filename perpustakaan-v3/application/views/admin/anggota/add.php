<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah Data Anggota</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Anggota</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/anggota/add', array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID Anggota</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="id" placeholder="ID Anggota" value="<?php echo set_value('id') ?>">
                      <small class="text-danger"><?php echo form_error('id') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>">
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                       <label>
                          <input type="radio" name="jk" value="Laki-laki" <?php echo (set_value('jk') == 'Laki-laki')? 'checked' : ''; ?>> Laki-laki
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                          <input type="radio" name="jk" value="Perempuan" <?php echo (set_value('jk') == 'Perempuan')? 'checked' : ''; ?>> Perempuan
                        </label>
                        <small class="text-danger"><?php echo form_error('jk') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-7">
                      <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?php echo set_value('alamat') ?></textarea>
                      <small class="text-danger"><?php echo form_error('alamat') ?></small>
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