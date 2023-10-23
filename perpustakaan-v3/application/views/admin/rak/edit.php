<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Data Rak</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Rak</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/rak/edit/'.$s->id_rak, array('class' => 'form-horizontal')); ?>
                  <input type="hidden" name="id" value="<?php echo $s->id_rak ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Rak</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Rak" value="<?php echo $s->nm_rak ?>">
                      <small class="text-danger"><?php echo form_error('nama') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Rak" value="<?php echo $s->ket_rak ?>">
                      <small class="text-danger"><?php echo form_error('keterangan') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/rak') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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