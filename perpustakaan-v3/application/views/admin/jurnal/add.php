<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah Data Jurnal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Jurnal</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/jurnal/add', array('class' => 'form-horizontal')); ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Prodi</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="prodi">
                        <option value="">--Pilih--</option>
                        <?php foreach ($prodi->result_array() as $p) { ?>
                        <option value="<?php echo $p['id_prodi'] ?>"><?php echo $p['nm_prodi'] ?></option>
                      <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Jurnal</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="jurnal" placeholder="Nama Jurnal" value="<?php echo set_value('jurnal') ?>">
                      <small class="text-danger"><?php echo form_error('jurnal') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">URL</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="url" placeholder="URL" value="<?php echo set_value('url') ?>">
                      <small class="text-danger"><?php echo form_error('url') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/jurnal') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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