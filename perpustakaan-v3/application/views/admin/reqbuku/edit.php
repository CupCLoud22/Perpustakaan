<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Data Request Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Request Buku</h3>
        </div>
        <div class="box-body">
                <?php echo form_open('admin/reqbuku/edit/'.$s->id_reqbuku, array('class' => 'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?php echo $s->id_reqbuku ?>">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="<?php echo $s->judul ?>">
                      <small class="text-danger"><?php echo form_error('judul') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pengarang</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" value="<?php echo $s->pengarang ?>">
                      <small class="text-danger"><?php echo form_error('pengarang') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="thn" placeholder="Tahun Terbit" value="<?php echo $s->thn_terbit ?>">
                      <small class="text-danger"><?php echo form_error('thn') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Buku</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Buku" value="<?php echo $s->jumlah ?>">
                      <small class="text-danger"><?php echo form_error('jumlah') ?></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="button" onclick="window.location='<?php echo site_url('admin/reqbuku') ?>'" class="btn btn-default btn-sm btn-flat"><i class="fa fa-remove"></i> Batal</button>
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